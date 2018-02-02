<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    //
    protected $table='guru';
 	protected $fillable=['id','nama_guru','mapel'];
 	protected $visible=['id','nama_guru','mapel'];

 	public function kehadiran_guru() {
 		
 		return $this ->hasMany('App\kehadiran_guru');
 	}
}
