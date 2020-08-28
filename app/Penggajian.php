<?php

namespace App;
use App\Dosen;
use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
	Protected $primaryKey ='id_penggajian';
    Protected $fillable=['id_penggajian','id_dosen','tanggal','jml_hadir','honor_satuan','gaji_honor','total_pajak','total_gaji_bersih'];

    public function dosen(){
    	return $this -> hasOne(Dosen::class, 'id_dosen', 'id_dosen');
    }
	
	public static function create(array $attributes = [])
	{
		$dosen = Dosen::where('id_dosen', $attributes['id_dosen'])->with('pangkat')->with('golongan')->with('pajak')->with('honor')->first();
		$totalGaji = (float)$dosen->honor->honor * (float)$attributes['jml_hadir'];
	
		if($dosen->pajak){
			$totalGajiBersih = $totalGaji - ($totalGaji / 100 * $dosen->pajak->pajak);
		}else{
			$totalGajiBersih = $totalGaji;
		}
		
		
		$model = new static($attributes);
		$model->honor_satuan = $dosen->honor->honor;
		$model->gaji_honor = $totalGaji;
		$model->total_pajak = $dosen->pajak ? $dosen->pajak->pajak : '';
		$model->total_gaji_bersih = $totalGajiBersih;
		$model->tanggal = $model->tanggal . '-01';
		$model->save();

		return $model;
	}

	

}
