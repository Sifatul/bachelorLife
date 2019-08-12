<?php

namespace App\Service;

use App\Bill;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\reset_password;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Config; 

class PasswordService
{


    public function reset_password($email)
    {
        // must change the email

 

        $user = User::where('email', $email)->first();
        if ($user) {
            $to_name = $user->name;
            $to_email =  $user->email;
            $token = str_random(60);
            $data = [
                'name' => $user->name, 
                'link' => url('/') . '/password_reset/' .  $token,
                'login_link' =>url('/') . '/password_reset/'
            ];          
            Mail::send('Mail.password_reset', $data, function ($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject('Reset Password');
                $message->from('sifat.wallet@gmail.com', 'BachelorLife');
            });

            $reset_password = new reset_password();
            $reset_password->user_id =  $user->id;
            $reset_password->reset_token = $token;
            if (  $reset_password->save()){
                $data['message'] = Config::get('constant.200');
                return response()->json($data, 200);
            }else{
                $data['message'] = Config::get('constant.500');
                return response()->json($data, 500);
            }
        } else {
            $data['message'] = 'Email does not exist!';
            return response()->json($data, 401);
        }
    }
    public function verify_token($token)
    {
        $token = reset_password::where('reset_token', '=', $token)
            ->where('created_at', '>', Carbon::now()->subHours(2))
            ->first();
        if ($token) {
            $data['data']=  $token;
            $data['message'] = Config::get('constant.200');
            return response()->json($data, 200);
        } else {
            $data['message'] = 'Token expired!!';
            return response()->json($data, 401);
        }
    }
    public function update(Request $request){
        $token = $request->reset_token;
        $res = $this->verify_token($token); 
        if ($res->status() == 200) {
            $user = User::find( $res->getData()->data->user_id);
            $user->password = bcrypt($request->password);         
           
           if($user->save()){
            $data['message'] = Config::get('constant.200');
            return response()->json($data, 200);
           }else{
            $data['message'] = Config::get('constant.500');
            return response()->json($data, 500);
           }  
        }else{
            $data['message'] = 'Token expired!!';
            return response()->json($data, 401);
        }
    }
}
