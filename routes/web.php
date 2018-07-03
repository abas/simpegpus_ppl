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


// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::group(['prefix' => 'admin',['middleware'=>'auth']], function () {
  Route::get('/', 'HomeController@pegawai')->name('dashboard');
  Route::get('/absens', 'HomeController@absen')->name('absens');
  
  Route::group(['prefix'=>'absen'],function(){
    // Route::get('/','PegawaiController@getPegawaiAllIndex')->name('get-pegawai-index');
    Route::get('/get','AbsenController@getAbsenAll')->name('get-absen');
    Route::get('/get/{id}','AbsenController@getAbsenByID')->name('get-absen-id');
    Route::get('/get/delete/{id}','AbsenController@getDelete')->name('get-absen-delete-id');
    Route::get('/get/deleteall','AbsenController@getDeleteAll')->name('get-absen-delete-all');
    Route::get('/get/deleteall/{date}','AbsenController@getDeleteAllByDate')->name('get-absen_deleteall-by-date');
    Route::post('/post','AbsenController@postAbsen')->name('post-absen');
    Route::get('/records','HomeController@recordAbsens')->name('get-absen-records');
    Route::get('/records/download/{date}','AbsenController@recordAbsensDownload')->name('get-absen-records-download');
  });

  Route::group(['prefix'=>'pegawai'],function(){
    Route::get('/get','PegawaiController@getPegawaiAll')->name('get-pegawai');
    Route::post('/post','PegawaiController@postPegawai')->name('post-pegawai');
    Route::get('/get/{id}','PegawaiController@getPegawaiByID')->name('get-pegawai-id');
    Route::get('/get/delete/{id}','PegawaiController@getDeleteByID')->name('get-pegawai-delete-id');
    Route::get('/get/deleteall','PegawaiController@getDeleteAll')->name('get-pegawai-delete-all');
    Route::get('/get/update/{id}','PegawaiController@getUpdate')->name('get-pegawai-update-id');
    Route::post('/post/update/{id}','PegawaiController@postUpdate')->name('post-pegawai-update-id');

  });

  Route::group(['prefix'=>'mutasi'],function(){
    Route::get('/','MutasiController@getMutasi')->name('get-mutasi-index');
    Route::get('/get','MutasiController@getMutasiAll')->name('get-mutasi');
    Route::post('/post','MutasiController@postMutasi')->name('post-mutasi');
  });

  Route::group(['prefix' => 'instansi'], function () {
    Route::get('/','InstansiController@getInstansi')->name('get-instansi-index');
    Route::post('/','InstansiController@postInstansiAdd')->name('post-instansi-add');
    Route::get('/get/update/{id}','InstansiController@getEditInstansi')->name('get-instansi-update');
    Route::post('/get/update/{id}','InstansiController@postUpdateInstansi')->name('get-instansi-updated');
    Route::get('/get/delete/{id}','InstansiController@getDeleteInstansiByID')->name('get-instansi-delete');
    Route::get('/get/download','InstansiController@recordDownloadInstansi')->name('get-instansi-downloadrecord');
  });

});
