<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\PasswordService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

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
    public function show($token)
    {
        $data = ['reset_token' => $token];
        return view('reset_password.update_password')
            ->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $res = $this->passwordservice->update($request);

        if ($res->status() == 200) {
            return redirect('/login')
                ->with('status', 'Password updated! Please login');
        } else {
            return redirect('/password_reset')
                ->withErrors(['message' => $res->getData()->message]);
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
    public function password_reset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {

            return view('reset_password.reset_password')
                ->withErrors($validator);
        }

        $res = $this->passwordservice->reset_password($request->get('email'));

        if ($res->status() == 200) {
            return redirect('/login')
                ->with('status', 'Email has been sent! Please check your inbox!');
        } else {
            return Redirect::back()->withErrors(['message' =>  $res->getData()->message]);
        }
    }
    
}
