<?php namespace App\Http\Requests;

class DosenRequest extends Request {
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
    

		return [



        'nama' => 'max:40|required',
        'alamat' => 'max:125|required',
        'hp' => 'max:14|required',
        'id_gol' => 'integer|required',
        'status' => 'max:30|required',
        'id_pangkat'=>'integer|required',
        'ket_dos' => 'max:50|required',
        'rutinitas' => 'max:100|required',
      
        
			
		];

	}
   public function validateBatasan()
   {

   }
}
