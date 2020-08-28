<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
	Protected $primaryKey ='id_jurusan';
    Protected $fillable=['id_jurusan','jurusan'];
}
