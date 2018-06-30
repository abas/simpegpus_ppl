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

Route::any('/csrf', function () {
  return csrf_token();
});
  
Route::get('/','PegawaiController@getPegawaiAllIndex')->name('get-absen-index');

Route::group(['prefix'=>'absen'],function(){
  // Route::get('/','PegawaiController@getPegawaiAllIndex')->name('get-pegawai-index');
  Route::get('/get','AbsenController@getAbsenAll')->name('get-absen');
  Route::get('/get/{id}','AbsenController@getAbsenByID')->name('get-absen-id');
  Route::get('/get/delete/{id}','AbsenController@getDelete')->name('get-delete-id');
  Route::get('/get/deleteall','AbsenController@getDeleteAll')->name('get-delete-all');
  Route::post('/post','AbsenController@postAbsen')->name('post-absen');
});

Route::group(['prefix'=>'pegawai'],function(){
  Route::get('/get','PegawaiController@getPegawaiAll')->name('get-pegawai');
  Route::get('/get/{id}','PegawaiController@getPegawaiByID')->name('get-pegawai-id');
  Route::get('/get/delete/{id}','PegawaiController@getDeleteByID')->name('get-delete-id');
  Route::get('/get/deleteall','PegawaiController@getDeleteAll')->name('get-delete-all');
  Route::get('/get/update/{id}','PegawaiController@getUpdate')->name('get-update-id');
  Route::post('/post/update/{id}','PegawaiController@postUpdate')->name('post-update-id');

});

Route::group(['prefix'=>'mutasi'],function(){
  Route::get('/','MutasiController@getMutasi')->name('get-mutasi-index');
  Route::get('/get','MutasiController@getMutasiAll')->name('get-mutasi');
  Route::post('/post','MutasiController@postMutasi')->name('post-mutasi');
});


// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('dashboard');
