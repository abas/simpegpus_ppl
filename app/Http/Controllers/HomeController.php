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
    public function pegawai()
    {
        $pegawais = Pegawai::select('*')->paginate(6);
        $newPegawais = Pegawai::orderBy('created_at','desc')->take(5)->get();
        // return $newPegawai;
        return view('admin.pegawai',compact(
            'pegawais','newPegawais'
        ));
    }

    public function absen()
    {
        $absens = Absen::select('*')->paginate(10);
        // return $absens;
        $absenRecordsToday = Absen::where(
            'created_at','>=',Carbon::today()
            )->paginate(8);
        
        return view('admin.absen_today',compact('absens','absenRecordsToday'));
        // return $absenRecordsToday;
    }

    public function recordAbsens()
    {
        $recordGroup = Absen::select('id','pegawai_id','created_at','updated_at')
                            ->get()
                            ->groupBy(function($date){
                                return Carbon::parse($date->created_at)->format('Y-m-d');
                            });
        
        return view('admin.record_absen',compact('recordGroup'));
    }
}