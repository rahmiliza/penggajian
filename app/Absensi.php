<?php

namespace App;
use  App\Mengajar;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
	Protected $primaryKey ='id_absensi';

  	Protected $fillable = ['id_absensi','id_mengajar','tanggal','hari'];

    public function mengajar(){
    		return $this -> hasOne(Mengajar::class, 'id_mengajar', 'id_mengajar');
    }
}
