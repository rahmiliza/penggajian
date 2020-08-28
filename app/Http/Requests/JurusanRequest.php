<?php namespace App\Http\Requests;

class JurusanRequest extends Request {
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
    

		return [



        'jurusan' => 'max:50|required',
        
      
        
			
		];

	}
   public function validateBatasan()
   {

   }
}
