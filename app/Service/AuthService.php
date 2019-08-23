<?php

namespace App\Service;

use App\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\AllToken;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Service\TokenService;


class AuthService
{
    protected $tokenservice;

    public function __construct(tokenservice $tokenservice)
    {
        $this->tokenservice = $tokenservice;
    }


    public function send_register_mail($user_id, $to_email, $to_name)
    {

        $create_token = $this->tokenservice->create($user_id, 1);
        if ($create_token->status() == 500) {

            return $create_token;
        }
        $token = $create_token->getData()->data->reset_token;

        $data['data'] = [
            'name' => $to_name,
            'web_link' => url('/') . '/email_verify/' .  $token,
            'api_link' => url('/') . '/api/email_verify/' .  $token,
            'email' => $to_email,
            'email_token' => $token,
        ];
        $res = Mail::send('Mail.registration_verify', $data['data'], function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('Confirmation of registration');
            $message->from('sifat.wallet@gmail.com', 'BachelorLife');
        });
        dd( $res);
        $data['message'] = 'Verification code has been send to your email address. Please check your inbox!';
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $check_user = User::where('email', '=', $request->email)->first();
        if ($check_user) {
            if ($check_user->status == 1) {
                //account is still unverified
                $res_email = $this->send_register_mail($check_user->id, $check_user->email, $check_user->name);
                return  $res_email;
            } elseif ($check_user->status == 2) {
                $data['message'] = 'Email already registered. Please login';
                return response()->json($data, 409);
            }
        } else {
            $user = new User();
            $user->email = $request->email;
            $user->password = bcrypt($request->password); //Hash::make();
            $user->name = $request->name;

            if ($user->save()) {
                // $user->user_id = $user->id;
                $res = $this->send_register_mail($user->id, $user->email,  $user->name);
                $user->email_token = $res->getData()->data->email_token;
                $data['data'] = $user;
                $data['message'] = $res->getData()->message;
                return response()->json($data, 200);
            } else {
                $data['message'] = Config::get('constant.500');
                return response()->json($data, 500);
            }
        }
    }

    public function login($credentials)
    {
        if (Auth::attempt($credentials, false)) {
            $user = User::where('email', $credentials['email'])
                ->where('status', '=', 2)
                ->first();
            // dd($user);
            if ($user) {
                $user->access_token = $user->createToken('MyApp')->accessToken;
                $data['data'] = $user;
                $data['message'] = Config::get('constant.200');
                return response()->json($data, 200);
            } else {
                $data['message'] = 'Please verify your email address.';
                return response()->json($data, 401);
            }
        } else {
            $check_user =  User::where('email', $credentials['email'])->first();
            if($check_user){
                $data['message'] = 'Invalid email or password';
                return response()->json($data, 401);
            }else{
                $data['message'] = 'Unregistered email address! Please register with us.';
            return response()->json($data, 404);
            }
            
        }
    }

    public function resend_verification_email($token)
    {
        $deactivate = $this->tokenservice->deactivate($token, 1);
        if ($deactivate->status() == 200|| $deactivate->status() == 422) {
            $user = User::find($deactivate->getData()->data->user_id);
            return $this->send_register_mail($user->id, $user->email, $user->name);
        } else {
            return $deactivate;
        }
    }
    public function set_user_verified($token)
    {
        $deactivate = $this->tokenservice->deactivate($token, 1);
        if ($deactivate->status() != 200) {
            return $deactivate;
        }
        $user = User::find($deactivate->getData()->data->user_id);
        $user->status = 2;
        if ($user->save()) {
            $data['message'] = 'User is verified successfully';
            return response()->json($data, 200);
        }
        $data['message'] = Config::get('constant.500');
        return response()->json($data, 500);
    }
}
