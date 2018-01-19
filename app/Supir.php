<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supir extends Model
{
    //
    protected $table ='supirs';
    protected $fiillable = ['foto','nama','jk','no_identitas','no_hp','alamat','harga_sewa'];
    protected $visible = ['foto','nama','jk','no_identitas','no_hp','alamat','harga_sewa'];
    public $timestamps = 'true';

    public function books(){
    	return $this->hasMany('App\Book');
    }
}
