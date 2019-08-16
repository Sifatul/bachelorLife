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
use App\Service\PasswordService;
use App\Service\TokenService;

class userController extends Controller
{

    protected $authservice, $passwordservice ,$tokenservice;

 
    public function __construct(authservice $authservice, passwordservice $passwordservice, tokenservice $tokenservice)
    {
        $this->authservice = $authservice;
        $this->passwordservice = $passwordservice;
        $this->tokenservice = $tokenservice;

    }
    public function index()
    {
        return view('auth/signin');
    }
    public function resend_verification_email($token){ 
        $res = $this->authservice->resend_verification_email($token);
        if ($res->status() == 200) {
        // dd($res);
            $res_content = $res->getData();
                        return view('plain')
                        ->with('resend_link', url('/') .'/resend_verification_email/'.$res_content->data->email_token  )
                        ->with('email',$res_content->data->email )
                        ->with('message','Verification email resent!');
        }else{
            dd($res);

        }
    }

    public function userSingUp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        if ($validator->fails()) {
            return view('auth/signup') 
            ->withErrors($validator);
        } 
        $res = $this->authservice->store($request);      

        $res_content = $res->getData();
        if ($res->status() == 401 || $res->status() == 409) {
            return back()->withErrors( ['message'=>$res_content->message]);
        }elseif ($res->status() == 200) {
// dd($res_content);


            return view('plain')
            ->with('resend_link', url('/') .'/resend_verification_email/'.$res_content->data->email_token  )
            ->with('email',$res_content->data->email  )
            ->with('message','Please verify your email address!');
            ;
            // ;
            // return   redirect('/login')
            // ->with('status', $res->getData()->message);
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
            Auth::loginUsingId($res->getData()->data->id,  $request->get('remember_me'));
            return   redirect('/');
        }else { 
            
            return view('auth.signin')
            ->withErrors(['message'=>$res->getData()->message]);
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


    public function verify_email($token){
        $set_user_verified = $this->authservice->set_user_verified($token);        
        if($set_user_verified->status() != 200){ 
            return redirect('/login')
            ->withErrors(['message'=>$set_user_verified->getData()->message]);
        }
        

        return   redirect('/login')
        ->with('status','Account verified.');

         
       }
       
    
}
