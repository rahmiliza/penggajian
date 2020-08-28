<?php

namespace App;

use App\Golongan;

use Illuminate\Database\Eloquent\Model;

class Pajak extends Model
{
	protected $primaryKey = 'id_pajak';
    protected $fillable =['id_pajak', 'id_gol', 'pajak'];
    
     public function golongan(){
    		return $this -> hasOne(Golongan::class, 'id_golongan', 'id_gol');
    }
}
