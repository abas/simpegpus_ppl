<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\DataSiswa;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::User();
        $mhs = DataSiswa::All();
        return view('home',compact('user','mhs'));
    }

    public function add()
    {
        return view('tambah');
    }

    public function addData(Request $req)
    {
        $rules = [
            'nama_siswa'         => 'required',
            'nim'      => 'required',
            'mata_kuliah'       => 'required',
            'nilai'       => 'required'
            
        ];
        
        $validator = Validator::make($req->all(),$rules);
        if($validator->fails()){
            return redirect(route('add'))
                  ->withInput()
                  ->withErrors($validator);
        }

        $this->validate($req, $rules);
        // 

        if(ucwords($req->nim)!=$req->nim){
            return redirect(route('add'))
            ->withInput()
            ->with("msg","nim harus diawali dengan huruf besar");
        }

        $id_user = Auth::User()->id;
        $data = new DataSiswa();

        $data->id_user = $id_user;
        $data->nama_siswa = $req->nama_siswa;
        $data->nim = $req->nim;
        $data->mata_kuliah = $req->mata_kuliah;
        $data->nilai = $req->nilai;
        
        $data->save();

        return redirect(route('home'))->with('msg','success input');
    }
}
