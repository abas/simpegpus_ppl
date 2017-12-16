<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataSiswa extends Model
{
    protected $table = 'data_siswa';
    protected $fillable = [
        'id_user','nama_siswa','nim',
        'mata_kuliah','nilai','status',
    ];
}
