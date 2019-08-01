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

class userController extends Controller
{
    //
    public function index()
    {

    }

    public function userSingUp(Request $request)
    {      

        $request = Request::create('api/user_store', 'POST', $request->toArray());
        $res = Route::dispatch($request);  
        return   redirect('/');  

    }

    public function userSignIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        $request = Request::create('api/user_login', 'POST', $request->toArray());
        $res = Route::dispatch($request);  
        return redirect('/'); 
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