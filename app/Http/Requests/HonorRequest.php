<?php namespace App\Http\Requests;

class HonorRequest extends Request {
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
    

		return [



        'id_pangkat' => 'max:20|required',
        'honor' => 'max:20|required',
        
      
        
			
		];

	}
   public function validateBatasan()
   {

   }
}
