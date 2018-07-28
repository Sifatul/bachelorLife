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

    Route::get('/signup', 'HomeController@signup', 301)->name('signup');
    Route::post('/signup','userController@userSingUp');


//    Route::get('/home','HomeController@index' )
//        ->middleware(['auth'])
//        ->name('home');

    Route::get('/logout','userController@logout')->name('logout');


});

//Auth::routes();
//

