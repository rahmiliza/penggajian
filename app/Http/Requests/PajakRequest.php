<?php namespace App\Http\Requests;

class PajakRequest extends Request {
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
    

		return [



        'id_gol' => 'max:20|required',
        'pajak' => 'max:20|required',
        
      
        
			
		];

	}
   public function validateBatasan()
   {

   }
}
