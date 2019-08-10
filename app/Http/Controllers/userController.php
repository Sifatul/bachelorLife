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

class userController extends Controller
{
    //
    public function index()
    { 
        return view('auth/signin');
    }

    public function userSingUp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        if ($validator->fails()) {
            return view('auth/signup');
        }


        $request = Request::create('api/user_store', 'POST', $request->toArray());
        $res = Route::dispatch($request);
        if ($res->status() == 200) {

            $user = new User();
            $user->email = $res->getData()->data->email;
            $user->password = $res->getData()->data->id; //Hash::make();
            $user->name = $res->getData()->data->name;
            Auth::login($user, true);
            return   redirect('/signup');
        }
    }

    public function userSignIn(Request $request)
    {
        // $validator = Validator::make($request->all(), [ 
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        if ($validator->fails()) {
            return redirect('/login');
        }



        $request = Request::create('api/user_login', 'POST', $request->toArray());
        $res = Route::dispatch($request);
        dd($res);

        if ($res->status() == 200) {
            $user = new User();
            $user->email = $res->getData()->data->email;
            $user->password = $res->getData()->data->id; //Hash::make();
            $user->name = $res->getData()->data->name;

            Auth::login($user, true);
            return   redirect('/');
        }else{
            return redirect('/login');
        }
    }

    public function signup()
    {
        return view('auth/signup');
    }

    public function logout()
    {
        return redirect('/')->with(Auth::logout());
        // $request = Request::create('api/logout','GET',[]);
        // $response = Route::dispatch($request);
        // echo $response;
        // return $response;
        // Auth::logout();
        // return redirect('/');
    }
}
