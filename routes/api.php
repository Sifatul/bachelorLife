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

Route::middleware(['auth:api'])->group(function () {   
    Route::post('/store_bill','Api\BillController@store');
    Route::post('/update_bill/{id}','Api\BillController@update');
    Route::GET('/delete/{id}','Api\BillController@delete'); 
    Route::GET('/show_list/{id}','Api\BillController@showList'); 
});

Route::middleware(['auth:api'])->group(function () {
    // Route::get('/store_bill','Api\BillController@show');
});

// Route::get('/store_bill', function(Request $request){
//     return   ( $request->header());
//  })  ->middleware('auth:api');
//  //disable auth middleware to inspect header
 



//  api based on user    
Route::post('/user_login','Api\UserController@login'); 
Route::post('/user_store','Api\UserController@store');
