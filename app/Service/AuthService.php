<?php

namespace App\Service;

use App\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\AllToken;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request; 

class AuthService
{
    public function send_register_mail($user_id, $to_email, $to_name){ 
        $token = str_random(60);
        $data = [
            'name' => $to_name, 
            'web_link' => url('/') . '/email_verify/' .  $token, 
            'api_link' => url('/') . '/api/email_verify/' .  $token, 
        ];          
        Mail::send('Mail.registration_verify', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('Confirmation of registration');
            $message->from('sifat.wallet@gmail.com', 'BachelorLife');
        });
        // store the token
        $AllToken = new AllToken();
        $AllToken->user_id =  $user_id;
        $AllToken->reset_token = $token;
        $AllToken->reason = 1; // registration verification reason =1;
        //status is true by default
        if ( $AllToken->save()){
            $data['message'] = 'Verification code has been send to your email address. Please check your inbox!';
            return response()->json($data, 200);
        }else{
            $data['message'] = Config::get('constant.500');
            return response()->json($data, 500);
        }


    }

    public function store(Request $request)
    {
        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password); //Hash::make();
        $user->name = $request->name;

        if ($user->save()) {
            // $user->user_id = $user->id;
            $res = $this->send_register_mail( $user->id, $user->email,  $user->name);
            $data['data'] = $user;
            $data['message'] = $res->getData()->message;
            return response()->json($data, 200);
        } else {
            $data['message'] = Config::get('constant.500');
            return response()->json($data, 500);
        }
    }

    public function login($credentials)
    {
        if (Auth::attempt($credentials,false)) {
            $user = User::where('email', $credentials['email'])
            ->where('status','=',2)
            ->first();
            if($user){
                $user->access_token = $user->createToken('MyApp')->accessToken;
                $data['data'] = $user;
                $data['message'] = Config::get('constant.200');
                return response()->json($data, 200);

            }else{
                $data['message'] = 'Please verify your email address.';
                return response()->json($data, 404);
            }
            
        } else {
            $data['message'] = 'Invalid email or password';
            return response()->json($data, 401);
        }
    }
    public function verify_email_token($token)
    {
        $AllToken = AllToken::where('reset_token', '=', $token)
            ->where('status', '=', true)
            ->where('reason', '=', 1)
            ->first();
        if ($AllToken) {
            $AllToken->status = false;
            $AllToken->save();
            $user = User::find($AllToken->user_id);
            $user->status = 2; //user if verified
            $user->save(); 
            $data['data']=  $user;
            $data['message'] = Config::get('constant.200');
            return response()->json($data, 200);
        } else {
            $data['message'] = 'Token expired!!';
            return response()->json($data, 401);
        }
    }


    
}
