<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
Use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    //
    public function index()
    {

    }

    public function userSingUp(Request $request)
    {      
        $validator = Validator:: make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        if ($validator->fails()) { 
            return view('auth/signup');
        } 
        
        $user = new User();
        $user->email = $request->email;
        $user->password =  Hash::make($request->password);
        $user->name = $request->name;
        
         

        $request = Request::create('api/user_store', 'POST', $request->toArray());
        $res = Route::dispatch($request);  
        // dd(Auth::attempt(['email' => $user->email , 'password' =>   bcrypt($request->password)]) );
        // dd($user);
        // dd(); exit; 
        if ($res->status()==200){
            Auth::login($user, true);
            return   redirect('/'); 
        } 

    }

    public function userSignIn(Request $request)
    {
        // $validator = Validator::make($request->all(), [ 
       $validator = Validator:: make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        if ($validator->fails()) { 
            return redirect('/');
        } 
        
        $user = new User();
        $user->email = $request->email;
        $user->password =  bcrypt($request->password);
        $user->name = $request->name;
             

        $request = Request::create('api/user_login', 'POST', $request->toArray());
        $res = Route::dispatch($request);  
        if ($res->status()==200){
            Auth::login($user, true);
            return   redirect('/'); 
        } 
    }

    public function signup(){
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