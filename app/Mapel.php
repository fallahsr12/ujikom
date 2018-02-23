<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    //
    protected $table='mapel';
	protected $fillable=['id','mapel'];
	protected $visible=['id','mapel'];

	public function guru()
	{
		return $this->hasMany('App\Guru','id_mapel');
	}
}
