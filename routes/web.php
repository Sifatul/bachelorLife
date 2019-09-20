<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['web'])->group(function () { 
    Route::get('/', 'BillController@index')->name('home');
    // auth a user
    Route::get('/login', 'userController@index')->name('login');
    Route::post('/signin','userController@userSignIn');
    Route::get('/signup', 'userController@signup')->name('signup');
    Route::post('/signup','userController@userSingUp'); 
    Route::get('/email_verify/{token}', 'userController@verify_email');
    Route::get('/resend_verification_email/{token}', 'userController@resend_verification_email');


    // password reset
    Route::get('/password_reset','PasswordController@index'); 
    Route::post('/password_reset','PasswordController@password_reset'); 
    Route::get('/password_reset/{token}','PasswordController@show');   
    Route::post('/password_reset/update','PasswordController@update'); 
    
    
  
});

Route::middleware(['web','auth'])->group(function () {
    Route::post('/new_bill','BillController@newBill');
    Route::post('/update_bill','BillController@update');
    Route::get('/delete_bill/{id}','BillController@delete');
    Route::get('/bills','BillController@allBills'); 
    Route::get('/archive','BillController@archive'); 
    Route::get('/logout','userController@logout')->name('logout');
});


 