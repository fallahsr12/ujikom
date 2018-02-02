<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
	protected $table='siswa';
 	protected $fillable=['id','nama_siswa','kelas','id_jurusan'];
 	protected $visible=['id','nama_siswa','kelas','id_jurusan'];

}
