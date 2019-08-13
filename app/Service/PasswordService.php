<?php

namespace App\Service;

 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\AllToken;
use Illuminate\Support\Carbon;

use Illuminate\Support\Facades\Config; 

class PasswordService
{


    public function reset_password($email)
    {
 
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

            $AllToken = new AllToken();
            $AllToken->user_id =  $user->id;
            $AllToken->reset_token = $token;
            $AllToken->reason = 2;
            //status is true by default
            if ( $AllToken->save()){
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
        $AllToken = AllToken::where('reset_token', '=', $token)
            ->where('created_at', '>', Carbon::now()->subHours(2))
            ->where('status', '=', true)
            ->where('reason', '=', 2)
            ->first();
        if ($AllToken) {
            $AllToken->status = false;
            $AllToken->save();
            // $data['data']=  $AllToken;
            $data['message'] = Config::get('constant.200');
            return response()->json($data, 200);
        } else {
            $data['message'] = 'Token expired!!';
            return response()->json($data, 401);
        }
    }
    public function update_password(Request $request){
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
