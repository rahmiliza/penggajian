<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mk extends Model
{
	Protected $primaryKey ='kode_mk';
    protected $fillable=['kode_mk','matkul','sks','smt'];
}
