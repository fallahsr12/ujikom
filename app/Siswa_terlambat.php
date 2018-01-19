<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa_terlambat extends Model
{
    protected $table='siswa_terlambat';
 	protected $fillable=['id','nama','kelas','jumlah_terlambat'];
 	protected $visible=['id','nama','kelas','jumlah_terlambat'];


 	public function siswa()
 	{
 		return $this->belongsTo('App\siswa');
 	}
}


