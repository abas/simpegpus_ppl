<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stugas extends Model
{
    protected $table = 'stugas';
    protected $fillable = [
        'tempat_betugas','tanggal_bertugas','pegawai_id'
    ];

}
