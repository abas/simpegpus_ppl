<?php

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
// use Carbon;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/ping',function(){
  return ['ping'=>'pong'];
});

Route::get('date', function () {
  $datenow = Carbon::now()->toDateString();
  $date = \App\Absen::select('created_at')->first()->created_at->toDateString();

  if($datenow == $date){
    return ['msg'=>'sama'];
  }return ['msg'=>'beda'];
  
});


Route::any('checkabsen/{id}', function(Request $req,$id) {
  $lastAbsen = \App\Absen::where('pegawai_id',$id)->first()->created_at->toDateString();
  if(Carbon::now()->toDateString() == $lastAbsen){
    return ['msg'=>'sudah asben'];
  }
  return ['msg'=>'belum asben'];
  // return $lastAbsen;
});

Route::group(['prefix'=>'absen'],function(){  
  Route::any('get', function () {
    return \App\Absen::all();
  });

  Route::any('get/pegawai{id_absen}',function($id_absen){
    $pegawai = \App\Absen::find($id_absen)->pegawai;
    return $pegawai;
  });
  
  Route::any('get/delete/{id}', function ($id) {
    $delete_absen = \App\Absen::find($id)->delete();
    if($delete_absen){
      return ['msg'=>'success : absen deleted'];
    }return ['msg'=>'error : can\'t delete menu'];  
  });
  
  Route::any('get/deleteall',function(){
    $absens = \App\Absen::all();
    // return $absens;
    foreach($absens as $absen){
      if(!$absen->delete()){
        break;
        return ['msg'=>'error : failed delete record'];
      }
    } 
    return ['msg'=>'success : success delete all record'];
  });
});

Route::any('/send/{text}',function($text){
  $textSend = \App\SendText::create([
    'text'=>$text
  ]);
  if($textSend){
    return ['status'=>'terkirim'];
  }return ['status'=>'gagal'];
});

Route::any('/get/text',function(){
  $text = \App\SendText::all();
  return $text;
});

Route::group(['prefix' => 'mutasi'], function () {
  Route::any('get', function () {
    return \App\Mutasi::all() == null ?  ['msg'=>'null'] : \App\Mutasi::all();
  });
  Route::any('post', function(Request $req) {
    // return $req;
    $validator = Validator::make($req->all(),[
      'pegawai_id'=>'required',
      'instansi_id'=>'required',
      'status_mutasi'=>'required'
    ]);
    if($validator->fails()){
      return $validator->errors();
    }

    $mutasiNew = \App\Mutasi::create([
      'pegawai_id'    => $req->pegawai_id,
      'instansi_id'   => $req->instansi_id,
      'status_mutasi' => $req->status_mutasi
    ]);

    if($mutasiNew){
      return ['msg'=>'created success'];
    }
    return ['msg'=>'created fail'];
  });
  Route::any('get/{id}', function ($id) {
    $mutasi = function (){
      if(Mutasi::find($id) != null){
          return Mutasi::find($id);
      }return ['msg'=>null];
    };
    return $mutasi;
  });
});

Route::group(['prefix' => 'instansi'], function () {
  Route::get('get', function () {
    return \App\Instansi::all() == null ? ['msg'=>null] : \App\Instansi::all();
  });
});

Route::group(['prefix' => 'pegawai'], function () {
  Route::any('get', function () {
    return \App\Pegawai::all();
  });
});