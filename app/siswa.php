<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
	protected $table='siswa';
 	protected $fillable=['id','nama','kelas'];
 	protected $visible=['id','nama','kelas'];

 	public function Siswa_terlambat()
 	{
 		return $this->hasMany('App\Siswa_terlambat');
 	}
}
