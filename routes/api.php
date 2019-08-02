<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 
Route::middleware(['web'])->group(function () { 
Route::post('/store_bill','Api\BillController@store');
Route::post('/update_bill/{id}','Api\BillController@update');
Route::GET('/delete/{id}','Api\BillController@delete'); 
Route::GET('/show_list/{id}','Api\BillController@showList'); 

//  api based on user    
Route::post('/user_login','Api\UserController@login'); 
Route::post('/user_store','Api\UserController@store');
});