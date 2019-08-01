<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use  Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
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
            return response()->json(['error'=>$validator->errors()], 401);
        }
         
        $user = new User();
        $user->email = $request->email;
        $user->password =  bcrypt($request->password);
        $user->name = $request->name;
       

        if ($user->save()) {
            Auth::login($user);
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            $success['name'] =  $user->name;
            return response()->json(['success'=>$success], 201);             
        } else {
            return response()->json([
                'message' => 'Internal Error!'
            ], 500);

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

    public function login(Request $request){

        $validator = Validator::make($request->all(), [ 
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]); 
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);
        }

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user();  
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['success' => $success],200); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        }         

    }
    public function logout(){
        if (Auth::check()) {
              Auth::logout();       
              response()->json(['success' => 'logout successful'],200); 
         }
    }

}
