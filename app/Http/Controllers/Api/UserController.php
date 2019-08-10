<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use  Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;

class UserController extends Controller
{
    public $Success_code = 200;
    public $Error_code = 500;
    public $Success_message = 'Successful';
    public $Error_message = 'Internal Error';
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
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'name' => 'required|max:120',
            'password' => 'required|min:4'
        ]);
        if ($validator->fails()) {
            $data['message'] = 'validation failed';
            $data['error'] = ['error' => $validator->errors()];
            return response()->json($data, 401);
        }

        $user = new User();
        $user->email = $request->email;
        $user->password = $request->password; //Hash::make();
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
    public function update(Request $request, $id)
    {
        //
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

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];
    


        if (Auth::attempt($credentials)) {
            $user = User::where('email',$request->get('email'))->first();
            $user->access_token = $user->createToken('MyApp')->accessToken;
            $data['data'] = $user; 
            
            $data['message'] = Config::get('constant.200');
            return response()->json($data, 200);
        } else {
            $data['message'] = Config::get('constant.500');
            return response()->json($data, 500);
        }
    }
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            $data['message'] = $Success_message;
            return response()->json($data, $Success_code);
        }
    }
}
