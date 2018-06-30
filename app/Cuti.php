<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $table = 'cutis';
    protected $fillable = [
        'pegawai_id','tanggal_mulai','tanggal_selesai'
    ];
}
