<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kehadiran_siswa extends Model
{
    protected $table='kehadiran_siswa';
 	protected $fillable=['id','nama','kelas','keterangan'];
 	protected $visible=['id','nama','kelas','keterangan'];

 	public function Siswa() {
 		return $this->belongsTo('App\siswa','id_siswa');
 	}
}
