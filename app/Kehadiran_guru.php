<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kehadiran_guru extends Model
{
    protected $table='kehadiran_guru';
 	protected $fillable=['id','id_guru','keterangan'];
 	protected $visible=['id','id_guru','keterangan'];

 	public function Guru() {
 		return $this -> belongsTo('App\Guru','id_guru');
 	}
 	
}
