<?php

namespace App\Service;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\AllToken;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;

class TokenService
{

    public function is_valid($token, $reason)
    {
        //check token exists
        // email verification reason =1;
        //status is true by default
        $AllToken = AllToken::where('reset_token', '=', $token)
            ->where('status', '=', true)
            ->where('reason', '=', $reason)
            ->first();
        if ($AllToken) {
            $data['data'] = $AllToken;
            return response()->json($data, 200);
        } else {
            $data['message'] ='Token expired!';
            return response()->json($data, 404);
        }
        
     }
    public function deactivate($token,$reason)
    {
       $token_valid = $this->is_valid($token,$reason);
       if($token_valid->status()==200){
           $AllToken = AllToken::find($token_valid->getData()->data->id);
           $AllToken->status = false;
           if ($AllToken->save()) {
               $data['data'] = $AllToken;
               return response()->json($data, 200);
           } else {
               $data['message'] = Config::get('constant.500');
               return response()->json($data, 500);
           }
       }else{
           return $token_valid;
       }

       
    }
    public function create($user_id, $reason)
    {
        $token = str_random(60);
        $AllToken = new AllToken();
        $AllToken->user_id =  $user_id;
        $AllToken->reset_token =   $token;
        $AllToken->reason = $reason;

        if ($AllToken->save()) {
            $data['data'] = $AllToken;
            return response()->json($data, 200);
        }
        $data['message'] = Config::get('constant.500');
        return response()->json($data, 500);

        // status is true by default
    }
  
}
