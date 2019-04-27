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

    Route::get('dynamicModal/{id}',[
        'as'=>'dynamicModal',
        'uses'=> 'WalletController@loadModal'
    ]);

    Route::get('/', 'HomeController@index')->name('home');
    Route::post('/signin','userController@userSignIn');

    Route::get('/signup', 'userController@signup')->name('signup');
    Route::post('/signup','userController@userSingUp');

    Route::get('/logout','userController@logout')->name('logout');


});

Route::middleware(['web','auth'])->group(function () {

    // Route::get('/wallet','WalletController@index')->name('wallet');
    Route::post('/new_bill','BillController@newBill');
    Route::get('/bills','BillController@allBills');
    // Route::post('/settings','userController@saveSettings')->name('saveSettings');
});

//Auth::routes();
//

