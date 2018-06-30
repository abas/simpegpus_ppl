<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawais';
    protected $fillable = [
        'no_ktp','gaji','status_pegawai','nama'
    ];

    public function absen()
    {
        return $this->hasMany('App\Absen','pegawai_id','id');
    }

    public static function null($pegawai)
    {
        return $pegawai == null;
    }
}
