<?php namespace App\Http\Requests;

class KelasRequest extends Request {
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
    

		return [



        'kelas' => 'max:20|required',
        
      
        
			
		];

	}
   public function validateBatasan()
   {

   }
}
