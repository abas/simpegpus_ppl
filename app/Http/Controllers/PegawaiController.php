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
      return ['msg'=>'error : pegawai not found'];
    }
    return $pegawai;
  }

  public function getUpdate($id)
  {
    $pegawai = Pegawai::find($id);
    if(Pegawai::null($pegawai)){
      return ['msg'=>'error : pegawai not found'];
    }
    return $pegawai;
  }
  
  public function postUpdate(Request $req,$id)
  {
    $validator = Validator::make($req->all(),[
      'nama'          => 'required',
      'gaji'          => 'required|integer|min:1',
      'status_pegawai'=> 'required|max:2'
    ]);
    if($validator->fails()){
      return ['msg'=>'error','data'=>$validator->errors()];
    }
    
    $pegawai = Pegawai::find($id);
    if(Pegawai::null($pegawai)){
      return ['msg'=>'error : pegawai not found'];
    }

    $pegawai_update = $pegawai->update([
      'nama'          => $req->nama,
      'gaji'          => $req->gaji,
      'status_pegawai'=> $req->status_pegawai
    ]);

    if($pegawai_update){
      return ['msg'=>'success','data'=>$pegawai];
    }return ['msg'=>'error : update failed'];
  }

  public function getDeleteByID($id)
  {
    $pegawai = Pegawai::find($id);
    if(Pegawai::null($pegawai)){
      return ['msg'=>'error : pegawai not found'];
    }
  
    $deleted_absen = \App\Absen::deleteAllCollection($pegawai->absen);
    if($deleted_absen && $pegawai->delete()){
      return ['msg'=>'success delete record'];
    }
    return ['msg'=>'failed delete record'];
  }
}
