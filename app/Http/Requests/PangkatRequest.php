<?php namespace App\Http\Requests;

class PangkatRequest extends Request {
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
    

		return [



        'pangkat' => 'max:20|required',
        
      
        
			
		];

	}
   public function validateBatasan()
   {

   }
}
