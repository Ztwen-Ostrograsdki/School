<?php 

namespace App\Http\ValidatorsSpaces;

use App\Models\Pupil;
use Illuminate\Support\Facades\Validator;

trait PupilsValidators {


	    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    
    public function pupilsPersoValidator(array $data, $except = null)
    {

    	if ($except !== null) {
    		$id = (int)$except;

	        if ($data['name'] !== null && $data['name'] !== "") {
	            $thisNameExist = Pupil::whereName($data['name'])->get()->toArray();
	            if ($thisNameExist !== []) {
	                $oldNameId = (Pupil::whereName($data['name'])->get()[0])->id;
	            }
	            else{
	                $oldNameId = null;
	            }
	        }
	        else{
	            $oldNameId = null;
	        }
	        if ($oldNameId == $id) {
                return Validator::make($data, [
                    'name' => ['required', 'string', 'max:255', 'min:2', 'bail'],
                    'classe_id' => ['numeric', 'bail'],
                    'sexe' => ['required', 'string', 'bail'],
                    'birth' => ['required', 'date', 'bail'],
                    'month' => ['required', 'string', 'bail'],
                    'year' => ['required', 'numeric', 'bail', 'max:'.date('Y')]
                ]);
            }
            else{
                return Validator::make($data, [
                    'name' => ['required', 'string', 'max:255', 'min:2', 'bail', 'unique:pupils'],
                    'classe_id' => ['numeric', 'bail'],
                    'sexe' => ['required', 'string', 'bail'],
                    'birth' => ['required', 'date', 'bail'],
                    'month' => ['required', 'string', 'bail'],
                    'year' => ['required', 'numeric', 'bail', 'max:'.date('Y')]
                ]);
            }
    	}
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'min:2', 'bail', 'unique:pupils'],
            'classe_id' => ['numeric', 'bail'],
            'sexe' => ['required', 'string', 'bail'],
            'birth' => ['required', 'date', 'bail'],
            'level' => ['required', 'string', 'bail'],
            'month' => ['required', 'string', 'bail'],
            'year' => ['required', 'numeric', 'bail', 'max:'.date('Y')]
        ]);
    }




}



