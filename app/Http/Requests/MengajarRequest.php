<?php namespace App\Http\Requests;

class MengajarRequest extends Request {
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
    

		return [
 //id_mengajar','id_dosen','kode_mk','thn_akademik','smt_akademik','id_jurusan','ket','id_kelas'


        'id_dosen' => 'max:125|required',
        'kode_mk' => 'max:14|required',
        'thn_akademik' => 'integer|required',
        'smt_akademik' => 'max:30|required',
        'id_jurusan'=>'integer|required',
        'id_kelas' => 'max:50|required',
        
      
        
			
		];

	}
   public function validateBatasan()
   {

   }
}
