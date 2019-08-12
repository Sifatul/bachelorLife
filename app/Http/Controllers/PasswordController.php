<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\PasswordService;
use Illuminate\Support\Facades\Validator;

class PasswordController extends Controller
{

    protected $passwordservice;

    public function __construct(passwordservice $passwordservice)
    {
        $this->passwordservice = $passwordservice;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //no token shall be sent before getting the email address        
        return view('reset_password.reset_password');
   
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request )
    {
        $res = $this->passwordservice->update($request);  
       
        if ($res->status() == 200) {    
            $data=[
                'reset_token'=>'',
                'message'=>'Password updated!'
            ];   
            return redirect('/login')
            ->with('status', 'Password updated! Please login');
        }else{

        }
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function password_reset(Request $request){     

        $res = $this->passwordservice->reset_password($request->get('email'));       

        if ($res->status() == 200) {
            return redirect('/login')
            ->with('status', 'Email has been sent! Please check your inbox!');
        }
          

    }
    public function verify_token($token){
        $res = $this->passwordservice->verify_token($token);  
        if ($res->status() == 200) {
            $data=['reset_token'=>$token];
            return view('reset_password.update_password')
            ->with($data);
        }else{
            return view('reset_password.update_password')
            ->with($res->getData()->message);
        }

        

    }
}
