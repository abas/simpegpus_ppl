<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session,Redirect,Validator;
use App\Absen,App\Cuti,App\Instansi,App\Mutasi,App\Pegawai,App\Stugas,App\User;

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
        $pegawais = Pegawai::select('*')->paginate(6);
        $newPegawais = Pegawai::orderBy('created_at','desc')->take(5)->get();
        // return $newPegawai;
        return view('home',compact(
            'pegawais','newPegawais'
        ));
    }
}
