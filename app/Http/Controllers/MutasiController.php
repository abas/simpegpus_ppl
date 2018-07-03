<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session,Redirect,Validator;
use App\Mutasi;

class MutasiController extends Controller
{
    public function getMutasi()
    {
        $pegawais = \App\Pegawai::all();
        $instansis = \App\Instansi::all();
        return view('mutasi',compact('pegawais','instansis'));   
    }

    public function getMutasiAll()
    {
        return Mutasi::orderBy('created_at','desc')->get();
    }

    public function postMutasi(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'pegawai_id'=>'required',
            'status_mutasi'=>'required',
            'instansi_id'=>'required'
        ]);if($validator->fails()){
            // return $validator->errors();
            Session::flash('req_error',true);
            return Redirect::back();
        }
        $mutasiNew = Mutasi::create([
            'pegawai_id'=>$req->pegawai_id,
            'status_mutasi'=>$req->status_mutasi,
            'instansi_id'=>$req->instansi_id
        ]);if($mutasiNew){
            Session::flash('mutasi_success',true);
            return Redirect::back();
        }
        Session::flash('mutasi_failed',true);
        return Redirect::back();
    }

    public function getMutasiByID($id)
    {
        $mutasi = function (){
            if(Mutasi::find($id) != null){
                return Mutasi::find($id);
            }return ['msg'=>null];
        };
        return $mutasi;
    }
}
