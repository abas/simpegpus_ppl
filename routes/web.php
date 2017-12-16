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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['middleware'=>'auth'],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::group(['prefix'=>'home'],function(){
        Route::get('/add',['as'=>'add','uses'=>'HomeController@add']);
        Route::post('/add',['as'=>'addData','uses'=>'HomeController@addData']);
    });
});


// API public ===============================================
// get All User
Route::get('/users','APIController@get_user');

// get Specific User
Route::get('/users/{id}','APIController@get_user_info');

// is User Admin ?
Route::get('/users/is-admin/{id}','APIController@isAdmin');