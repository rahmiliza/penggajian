<?php 

namespace App\Http\Requests;

use Validator;
use App\Dosen;

class PenggajianRequest extends Request {
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		Validator::extend('dosens', function ($attribute, $value, $parameters, $validator) 
		{
			$dosen = Dosen::where('id_dosen', $value)->first();
			if(!$dosen){ return null; }
			return true;
		});

		return [
 //id_mengajar','id_dosen','kode_mk','thn_akademik','smt_akademik','id_jurusan','ket','id_kelas'

//'id_penggajian','id_mengajar','bulan','jml_hadir','honor_satuan','gaji_honor','total_pajak','total_gaji_bersih'];

        'id_dosen' => 'max:14|required|dosens:id_dosen',
        'tanggal' => 'max:20|required',
        'jml_hadir' => 'max:30|required',
			
		];

	}
	
	
}
