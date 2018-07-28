<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    //
    public function index(){
        return view('home');
    }

    public function userSingUp(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'name' => 'required|max:120',
            'password' => 'required|min:4'
        ]);

        $password = bcrypt($request->password);


        $user = new User();
        $user->email = $request->email;
        $user->password = $password;
        $user->name = $request->name;
        $user->save();
        Auth::login($user);
        return view('home');

    }

    public function userSignIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);


        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->intended('/');
        } else {
            if (User::where('email', $request['email'])->first()) {
                return redirect()->back()->with('auth_failed', ['Wrong password ']);
            } else {
                return redirect()->back()->with('auth_failed', ['Wrong email ']);
            }
        }
        return route('signin');
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }


}
