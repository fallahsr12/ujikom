<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kehadiran_guru extends Model
{
    protected $table='kehadiran_guru';
 	protected $fillable=['id','nama','keterangan'];
 	protected $visible=['id','nama','keterangan'];
}
