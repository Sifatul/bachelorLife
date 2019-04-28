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

 
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('/signin','userController@userSignIn');

    Route::get('/signup', 'userController@signup')->name('signup');
    Route::post('/signup','userController@userSingUp');

    Route::get('/logout','userController@logout')->name('logout');


});

Route::middleware(['web','auth'])->group(function () {
    Route::post('/new_bill','BillController@newBill');
    Route::post('/edit_bill','BillController@editBill');
    Route::get('/delete_bill/{id}','BillController@delete');
    Route::get('/bills','BillController@allBills'); 
});

//Auth::routes();
//

