<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Service\AuthService;
use Illuminate\Support\Facades\Mail;

class userController extends Controller
{

    protected $authservice;

    public function __construct(authservice $authservice)
    {
        $this->authservice = $authservice;
    }
    public function index()
    {
        return view('auth/signin');
    }

    public function userSingUp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4'
        ]);

        if ($validator->fails()) {
            return view('auth/signup') 
            ->withErrors($validator);
        } 
        $res = $this->authservice->store($request);
        if ($res->status() == 200) {
            return   redirect('/login')
            ->with('status', 'Registration Successful!');
        }
    }

    public function userSignIn(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        if ($validator->fails()) {
            return redirect('/login')
            ->withErrors($validator);
        }

        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];
             
        $res = $this->authservice->login($credentials);

        if ($res->status() == 200) {
            Auth::loginUsingId($res->getData()->data->id, false);
            return   redirect('/');
        } else {
 
            return redirect('/login')
            ->withErrors($res->getData());
        }
    }

    public function signup()
    {
        return view('auth/signup');
    }

    public function logout()
    {
        return redirect('/login')->with(Auth::logout()); 
    }
    
  
    
}
