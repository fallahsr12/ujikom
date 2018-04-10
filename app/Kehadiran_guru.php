<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kehadiran_guru extends Model
{
    protected $table='kehadiran_guru';

 	public function Guru() {
 		return $this -> belongsTo('App\Guru','id_guru');
 	}
 	
}
