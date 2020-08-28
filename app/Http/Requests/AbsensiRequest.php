<?php namespace App\Http\Requests;

class AbsensiRequest extends Request {
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
    

		return [



        'id_mengajar' => 'max:20|required',
        'tanggal' => 'max:20|required',
        'hari' => 'max:20|required',
        
      
        
			
		];

	}
   public function validateBatasan()
   {

   }
}
