<?php

namespace App;
use  App\Pangkat;
use App\Golongan;
use App\Honor;
use App\Pajak;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
		protected $primaryKey = 'id_dosen';
     protected $fillable =['id_dosen', 'nama', 'alamat', 'hp', 'id_gol', 'status', 'id_pangkat', 'ket_dos', 'rutinitas'];
     public function golongan(){
    		return $this -> hasOne(Golongan::class, 'id_golongan', 'id_gol');
    }
    public function pangkat(){
    		return $this -> hasOne(Pangkat::class, 'id_pangkat', 'id_pangkat');
    }
    public function honor(){
    		return $this -> hasOne(Honor::class, 'id_pangkat', 'id_pangkat');
    }
    public function pajak(){
    		return $this -> hasOne(Pajak::class, 'id_gol', 'id_gol');
    }
}
