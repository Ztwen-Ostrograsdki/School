<?php 

namespace App\Http\ValidatorsSpaces;

use App\Models\Pupil;
use Illuminate\Support\Facades\Validator;

class PupilsValidators {

	public $data;


	public function __construct($data)
	{
		$this->data = $data;
	}

	    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    
    public function pupilsPersoValidator($except = null)
    {
    	$data = $this->data;

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'min:2', 'bail', 'unique:pupils'],
            'classe' => ['numeric', 'bail'],
            'sexe' => ['required', 'string', 'bail'],
            'birth' => ['required', 'date', 'bail'],
            'month' => ['required', 'string', 'bail'],
            'year' => ['required', 'numeric', 'bail', 'max:'.date('year')]
        ]);
    }




}



