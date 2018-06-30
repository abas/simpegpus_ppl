<?php

namespace App\Http\Controllers;
use Session,Redirect,Validator;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Absen;

class AbsenController extends Controller
{

  public function getAbsenAll()
  {
    $absens = Absen::orderBy('created_at','desc')->get();
    return $absens;
  }

  public function postAbsen(Request $req)
  {
    $validator = Validator::make($req->all(), [
      'pegawai_id'  => 'required'
    ]);
    if($validator->fails()){
      // return ['msg'=>'error','error'=>$validator->errors()];
      Session::flash('req_error',true);
      return Redirect::back();
    }

    $pegawai = \App\Pegawai::find($req->pegawai_id);
    if(\App\Pegawai::null($pegawai)){
      return ['msg'=>'error : pegawai not found']; 
    } 
    
    $lastAbsen = Absen::where('pegawai_id',$req->pegawai_id)->first();
    if(!Absen::null($lastAbsen)){
      if(Carbon::now()->toDateString() == $lastAbsen->created_at->toDateString()){
        // return ['msg'=>'sudah absen'];
        Session::flash('sudah_absen',true);
        return Redirect::back();
      }
      $absen = Absen::create([
        'pegawai_id' => $req->pegawai_id
      ]);
      if($absen){
        Session::flash('sukses_absen',true);
        return Redirect::back();
      }
      // return ['msg'=>'error : absen failed'];
      Session::flash('gagal_absen',true);
      return Redirect::back();
    }
    $absen = Absen::create([
      'pegawai_id' => $req->pegawai_id
    ]);
    if($absen){
      // return $pegawai;
      Session::flash('sukses_absen',true);
      return Redirect::back();
    }
    // return ['msg'=>'error : absen failed'];
    Session::flash('gagal_absen',true);
    return Redirect::back();
  }

  public function getAbsenByID($id)
  {
    $absen = Absen::find($id);
    if(Absen::null($absen)){
      return ['msg'=>'error : absen not found'];
    }
    return $absen;
  }

  public function getDelete($id)
  {
    $delete_absen = Absen::find($id)->delete();
    if($delete_absen){
      return ['msg'=>'success : absen deleted'];
    }return ['msg'=>'error : can\'t delete absen'];
  }

  public function getDeleteAll()
  {
    $absens = Absen::all();
    foreach($absens as $absen){
      if(!$absen->delete()){
        break;
        return ['msg'=>'error : failed delete record'];
      }
    }return ['msg'=>'success : success delete all record'];
  }
}
