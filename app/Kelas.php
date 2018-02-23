<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //
	 protected $table='kelas';
	 protected $fillable=['id','kelas'];
	 protected $visible=['id','kelas'];

	 public function siswa()
	 {
	 	return $this->hasMany('App\siswa','id_kelas');
	 }
}
