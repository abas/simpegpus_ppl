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
    
    $lastAbsen = Absen::where('pegawai_id',$req->pegawai_id)->orderBy('created_at','desc')->first();
    if(!Absen::null($lastAbsen)){
      $sudahAbsen = Carbon::now()->toDateString() == $lastAbsen->created_at->toDateString(); 
      if($sudahAbsen){
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
      Session::flash('absen_success_deleted',true);
      return Redirect::back();
      // return ['msg'=>'success : absen deleted'];
    }
    Session::flash('absen_failed_deleted',true);
    return Redirect::back();
    // return ['msg'=>'error : can\'t delete absen'];
  }

  public function getDeleteAll()
  {
    $absens = Absen::all();
    foreach($absens as $absen){
      if(!$absen->delete()){
        break;
        Session::flash('absen_failed_deleteall',true);
        return Redirect::back();
        // return ['msg'=>'error : failed delete record'];
      }
      Session::flash('absen_deleteall',true);
      return Redirect::back();
    // }return ['msg'=>'success : success delete all record'];
    }
  }
  public function getDeleteAllByDate($date)
  {
    $deleteAbsen = Absen::whereDate('created_at','=',$date)->get();
    foreach($deleteAbsen as $absen){
      if(!$absen->delete()){
        break;
        Session::flash('absen_failed_deleteall',true);
        return Redirect::back();
        // return ['msg'=>'error : failed delete record'];
      }
      // }return ['msg'=>'success : success delete all record'];
    }
    Session::flash('absen_success_deleteall',true);
    return Redirect::back();
  }

  public function recordAbsensDownload($date)
  {
    $absensRecord = Absen::whereDate('created_at','=',$date)->get();
    // return $absensRecord;
    $file="record_absen_".$date.".xls";
    
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=$file");
    echo "
      <table  >
        <thead>
          <tr>
            <th>ID</td>
            <th>Pegawai ID</td>
            <th>Nama</td>
            <th>Tercatat</td>
            <th>TerUpdate</td>
          </tr>
        </thead>
        <tbody>
        ";
      foreach($absensRecord as $data){
        echo "
          <tr>
            <td>$data->id</td>
            <td>$data->pegawai_id</td>
            <td>".$data->pegawai->nama."</td>
            <td>$data->created_at</td>
            <td>$data->updated_at</td>
          </tr>
        ";
        }
    echo "</tbody></table>";
  }
}