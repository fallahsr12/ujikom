<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
	protected $table='siswa';
 	protected $fillable=['id','nama_siswa','kelas','id_kelas'];
 	protected $visible=['id','nama_siswa','kelas','id_kelas'];

 	public function Kelas() {
 		return $this->belongsTo('App\Kelas','id_kelas');
 	}

 	public function Kehadiran_siswa() {
 		return $this->hasMany('App\Kehadiran_siswa','id_siswa');
 	}
}
