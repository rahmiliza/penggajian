<?php namespace App\Http\Requests;

class MkRequest extends Request {
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
    

		return [



        'matkul' => 'max:20|required',
          'sks' => 'max:20|required',
            'smt' => 'max:20|required',
        
      
        
			
		];

	}
   public function validateBatasan()
   {

   }
}
