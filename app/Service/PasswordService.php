<?php

namespace App\Service;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\AllToken;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use App\Service\TokenService;

class PasswordService
{
    protected $tokenservice;

    public function __construct(tokenservice $tokenservice)
    {
        $this->tokenservice = $tokenservice;
    }


    public function reset_password($email)
    {

        $user = User::where('email', $email)->first();
        if ($user) {
            $to_name = $user->name;
            $to_email =  $user->email;
            $token_create = $this->tokenservice->create($user->id, 2);
            if ($token_create->status() == 500) {
                return  $token_create;
            }
            $token = $token_create->getData()->data->reset_token;
            $data = [
                'name' => $user->name,
                'link' => url('/') . '/password_reset/' .  $token,
                'login_link' => url('/') . '/password_reset/'
            ];
            Mail::send('Mail.password_reset', $data, function ($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject('Reset Password');
                $message->from('sifat.wallet@gmail.com', 'BachelorLife');
            });

            $data['message'] = Config::get('constant.200');
            return response()->json($data, 200);
        } else {
            $data['message'] = 'Email does not exist!';
            return response()->json($data, 401);
        }
    }

    public function update_password(Request $request)
    {
        $token = $request->reset_token;
        $deactivate = $this->tokenservice->deactivate($token, 2);
        if ($deactivate->status() == 200) {
            $user = User::find($deactivate->getData()->data->user_id);
            $user->password = bcrypt($request->password);
            if ($user->save()) {
                $data['message'] = Config::get('constant.200');
                return response()->json($data, 200);
            } else {
                $data['message'] = Config::get('constant.500');
                return response()->json($data, 500);
            }
        } else {
            return $deactivate;
        }
    }
}
