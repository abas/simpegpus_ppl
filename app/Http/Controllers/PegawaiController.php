<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use Carbon\Carbon;

use Redirect,Session,Validator;

class PegawaiController extends Controller
{
  public function getPegawaiAll()
  {
    $pegawais = Pegawai::all();
    return $pegawais;
  }

  public function getPegawaiAllIndex()
  {
    $pegawais = Pegawai::all();
    return view('absen',compact('pegawais'));
  }

  public function getPegawaiByID($id)
  {
    $pegawai = Pegawai::find($id);
    if(Pegawai::null($pegawai)){
      Session::flash('pegawai_notfound',true);
      return Redirect::back();
      // return ['msg'=>'error : pegawai not found'];
    }
    Session::flash('pegawai_update',true);
    return Redirect::back();
    // return $pegawai;
  }

  public function postPegawai(Request $req)
  {
    $validator = Validator::make($req->all(),[
      'nama'=>'required|string',
      'no_ktp'=>'required|string|max:225|unique:pegawais',
      'gaji'=>'required|integer|min:1000',
      'status_pegawai'=>'required|integer|min:1|max:2'
    ]);if($validator->fails()){
      // return $validator->errors();
      Session::flash('pegawai_errval',true);
      return Redirect::back()->withErrors('err',$validator->errors());
    }

    $pegawaiSaved = Pegawai::create([
      'nama'=>$req->nama,
      'no_ktp'=>$req->no_ktp,
      'gaji'=>$req->gaji,
      'status_pegawai'=>$req->status_pegawai
    ]);if($pegawaiSaved){
      Session::flash('pegawai_created',true);
      return Redirect::back();
    }

    Session::flash('pegawai_failed_creared',true);
    return Redirect::back();
  }

  public function getUpdate($id)
  {
    $pegawai = Pegawai::find($id);
    if(Pegawai::null($pegawai)){
      Session::flash('pegawai_notfound',true);
      return Redirect::back();
      // return ['msg'=>'error : pegawai not found'];
    }
    Session::flash('pegawai_update',true);
    return Redirect::back()->with('pegawai',$pegawai);
    // return $pegawai;
  }
  
  public function postUpdate(Request $req,$id)
  {
    $validator = Validator::make($req->all(),[
      'nama'          => 'required|string|max:225',
      'gaji'          => 'required|integer|min:1',
      'status_pegawai'=> 'required|integer|max:2|min:0'
    ]);
    if($validator->fails()){
      Session::flash('pegawai_errval',true);
      return Redirect::back()->withErrors($validator->errors());
      // return ['msg'=>'error','data'=>$validator->errors()];
    }
    
    $pegawai = Pegawai::find($id);
    if(Pegawai::null($pegawai)){
      Session::flash('pegawai_notfound',true);
      return Redirect::back();
      // return ['msg'=>'error : pegawai not found'];
    }

    $pegawai_update = $pegawai->update([
      'nama'          => $req->nama,
      'gaji'          => $req->gaji,
      'status_pegawai'=> $req->status_pegawai
    ]);

    if($pegawai_update){
      Session::flash('pegawai_updated',true);
      return Redirect::back();
      // return ['msg'=>'success','data'=>$pegawai];
    }Session::flash('pegawai_failed_deleted',true);
    return Redirect::back();
    // return ['msg'=>'error : update failed'];
  }

  public function getDeleteByID($id)
  {
    $pegawai = Pegawai::find($id);
    if(Pegawai::null($pegawai)){
      Session::flash('pegawai_notfound',true);
      return Redirect::back();
      // return ['msg'=>'error : pegawai not found'];
    }
  
    $deleted_absen = \App\Absen::deleteAllCollection($pegawai->absen);
    if($deleted_absen && $pegawai->delete()){
      Session::flash('pegawai_success_deleted',true);
      return Redirect::back();
      // return ['msg'=>'success delete record'];
    }
    Session::flash('pegawai_failed_deleted',true);
    return Redirect::back();
    // return ['msg'=>'failed delete record'];
  }
}
