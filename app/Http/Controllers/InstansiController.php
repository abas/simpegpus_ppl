<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session,Redirect,Validator;
use App\Instansi as Ansi;

class InstansiController extends Controller
{
    public function getInstansi()
    {
        $newInstansis = Ansi::orderBy('id','desc')->take(12)->paginate(6);
        $instansis = Ansi::all();
        return view('admin.instansi',compact('instansis','newInstansis'));
    }

    public function postInstansiAdd(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'nama_instansi' => 'required|string|max:225'
        ]);if($validator->fails()){
            return $validator->errors();
        }

        $newInstansi = Ansi::create($req->all());
        if($newInstansi){
            return ['msg'=>'success add'];
        }
        return ['msg'=>'failed add'];
    }

    public function getEditInstansi($id)
    {
        $instansi = Ansi::find($id);if($instansi == null){
            return ['obj'=>null];
        }
        Session::flash('instansi_update',true);
        return Redirect::back()->with('instansi',$instansi);
    }

    public function postUpdateInstansi(Request $req, $id)
    {
        $validator = Validator::make($req->all(),[
            'nama_instansi' => 'required'
        ]);if($validator->fails()){
            Session::flash('instansi_errval',true);
            return Redirect::back()->withErrors($validator->errors());
        }

        $upInstansi = Ansi::find($id)->update([
            'nama_instansi' => $req->nama_instansi
        ]);if($upInstansi){
            Session::flash('instansi_success_updated',true);
            return Redirect::back();
            // return [
            //     'msg'=>'success update',
            //     'obj'=>Ansi::find($id)
            // ];
        }
        Session::flash('instansi_failed_updated');
        return Redirect::back();
        // return ['msg'=>'failed update'];
    }

    public function getDeleteInstansiByID($id)
    {
        $instansi = Ansi::find($id);if($instansi == null){
            Session::flash('instansi_notfound',true);
            return Redirect::back();
            // return ['obj'=>null];
        }if($instansi->delete()){
            Session::flash('instansi_success_deleted',true);
            return Redirect::back();
            // return ['msg'=>'deleted'];
        }
        Session::flash('instansi_failed_deleted',true);
        return Redirect::back();
        // return ['msg'=>'failed to delete'];
    }

}
