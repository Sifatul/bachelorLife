<?php

namespace App\Service;

use App\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request; 

class AuthService
{
    public function store(Request $request)
    {
        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password); //Hash::make();
        $user->name = $request->name;

        if ($user->save()) {
            $user->user_id = $user->id;
            $user->access_token = $user->createToken('MyApp')->accessToken;
            $data['data'] = $user;
            $data['message'] = Config::get('constant.201');
            return response()->json($data, 200);
        } else {
            $data['message'] = Config::get('constant.500');
            return response()->json($data, 500);
        }
    }

    public function login($credentials)
    {
        if (Auth::attempt($credentials)) {
            $user = User::where('email', $credentials['email'])->first();
            $user->access_token = $user->createToken('MyApp')->accessToken;
            $data['data'] = $user;

            $data['message'] = Config::get('constant.200');
            return response()->json($data, 200);
        } else {
            $data['message'] = 'Invalid email or password';
            return response()->json($data, 401);
        }
    }

    
}
