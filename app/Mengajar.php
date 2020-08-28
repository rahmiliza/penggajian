<?php

namespace App;
use App\Mk;
use App\Dosen;
use App\Jurusan;
use App\Kelas;
use Illuminate\Database\Eloquent\Model;

class Mengajar extends Model
{

	Protected $primaryKey ='id_mengajar';
    Protected $fillable =['id_mengajar','id_dosen','kode_mk','thn_akademik','smt_akademik','id_jurusan','ket','id_kelas'];
     public function mk(){
    		return $this -> hasOne(Mk::class, 'kode_mk', 'kode_mk');
    }
    public function dosen(){
    		return $this -> hasOne(Dosen::class, 'id_dosen', 'id_dosen');
    }
     public function jurusan(){
    		return $this -> hasOne(Jurusan::class, 'id_jurusan', 'id_jurusan');
    }
    public function kelas(){
    		return $this -> hasOne(Kelas::class, 'id_kelas', 'id_kelas');
    }
}
