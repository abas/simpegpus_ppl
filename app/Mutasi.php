<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    protected $table = 'mutasis';
    protected $fillable = [
        'status_mutasi','pegawai_id','instansi_id'
    ];
    
    public static function getCountOnInstansi($instansi_id)
    {
        return Mutasi::where('instansi_id',$instansi_id)->get()->count();
    }
}
