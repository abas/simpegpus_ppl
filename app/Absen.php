<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
	protected $table = 'absens';
	protected $fillable = [
		'pegawai_id'
	];

	public function pegawai()
	{
		return $this->belongsTo('App\Pegawai','pegawai_id','id');
	}

	public static function null($absen)
	{
		return $absen == null;
	}

	public static function deleteAllCollection($absens)
	{
		foreach($absens as $absen){
			if(!$absen->delete()){
				break;
				return false;
			}
		}
		return true;
	}
}
