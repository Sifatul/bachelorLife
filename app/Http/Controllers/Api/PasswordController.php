<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        //
    }

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
            $data['message'] = 'Password updated!';
            return response()->json($data, 200);
        } else {
            $data['message'] = $res->getData()->message;
            return response()->json($data, $res->status());
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
            return response()->json(['error' => $validator->errors()], 401); 
        }

        $res = $this->passwordservice->reset_password($request->get('email'));


        if ($res->status() == 200) {
            $data['message'] = 'Email has been sent! Please check your inbox!';
            return response()->json($data, 200);
        } else {
            $data['message'] = $res->getData()->message;
            return response()->json($data, $res->status());
        }

 
    }

    
}
