<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    protected $table = 'mutasis';
    protected $fillable = [
        'status_mutasi','pegawai_id','instansi_id'
    ];
}
