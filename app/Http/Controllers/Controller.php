<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function teachersValidator(array $data, $level, $except = null)
    {
        if ($level === "primary") {
            if ($except !== null) {
                $id = (int)$except;

                $id = (int)$except;

                if ($data['name'] !== null && $data['name'] !== "") {
                    $thisNameExist = Teacher::whereName($data['name'])->get()->toArray();
                    if ($thisNameExist !== []) {
                        $oldNameId = (Teacher::whereName($data['name'])->get()[0])->id;
                    }
                    else{
                        $oldNameId = null;
                    }
                }
                else{
                    $oldNameId = null;
                }
                if ($data['email'] !== null && $data['email'] !== "") {
                    $thisEmailExist = Teacher::whereEmail($data['email'])->get()->toArray();
                    if ($thisEmailExist !== []) {
                        $oldEmailId = (Teacher::whereEmail($data['email'])->get()[0])->id;
                    }
                    else{
                        $oldEmailId = null;
                    }
                }
                else{
                    $oldEmailId = null;
                }

                if ($oldNameId == $id || $oldEmailId == $id) {
                    return Validator::make($data, [
                        'name' => ['required', 'string', 'max:255', 'min:2', 'bail'],
                        'email' => ['required', 'string', 'email', 'max:255', 'bail'],
                        'contact' => ['required', 'string', 'min:7', 'bail'],
                        'residence' => ['required', 'string', 'min:5', 'bail'],
                        'classe' => ['numeric', 'bail'],
                        'sexe' => ['required', 'string', 'bail'],
                        'birth' => ['required', 'date', 'bail'],
                        'month' => ['required', 'string', 'bail'],
                        'year' => ['required', 'numeric', 'bail', 'max:'.date('Y')]
                    ]);
                }
                else{
                    return Validator::make($data, [
                        'name' => ['required', 'string', 'max:255', 'min:2', 'bail', 'unique:teachers'],
                        'email' => ['required', 'string', 'email', 'max:255', 'bail', 'unique:teachers'],
                        'contact' => ['required', 'string', 'min:7', 'bail'],
                        'residence' => ['required', 'string', 'min:5', 'bail'],
                        'classe' => ['numeric', 'bail'],
                        'sexe' => ['required', 'string', 'bail'],
                        'birth' => ['required', 'date', 'bail'],
                        'month' => ['required', 'string', 'bail'],
                        'year' => ['required', 'numeric', 'bail', 'max:'.date('Y')]
                    ]);
                }
            }
            else{
                return Validator::make($data, [
                    'name' => ['required', 'string', 'max:255', 'min:2', 'bail', 'unique:teachers'],
                    'email' => ['required', 'string', 'email', 'max:255', 'bail', 'unique:teachers'],
                    'contact' => ['required', 'string', 'min:7', 'bail'],
                    'residence' => ['required', 'string', 'min:5', 'bail'],
                    'classe' => ['numeric', 'bail'],
                    'sexe' => ['required', 'string', 'bail'],
                    'level' => ['required', 'string', 'bail'],
                    'birth' => ['required', 'date', 'bail'],
                    'month' => ['required', 'string', 'bail'],
                    'year' => ['required', 'numeric', 'bail', 'max:'.date('Y')]
                ]);
            }
        }
        elseif ($level === "secondary") {

            if ($except !== null) {
                $id = (int)$except;

                if ($data['name'] !== null && $data['name'] !== "") {
                    $thisNameExist = Teacher::whereName($data['name'])->get()->toArray();
                    if ($thisNameExist !== []) {
                        $oldNameId = (Teacher::whereName($data['name'])->get()[0])->id;
                    }
                    else{
                        $oldNameId = null;
                    }
                }
                else{
                    $oldNameId = null;
                }
                if ($data['email'] !== null && $data['email'] !== "") {
                    $thisEmailExist = Teacher::whereEmail($data['email'])->get()->toArray();
                    if ($thisEmailExist !== []) {
                        $oldEmailId = (Teacher::whereEmail($data['email'])->get()[0])->id;
                    }
                    else{
                        $oldEmailId = null;
                    }
                }
                else{
                    $oldEmailId = null;
                }
                
                if ($oldNameId == $id || $oldEmailId == $id) {
                    return Validator::make($data, [
                        'name' => ['required', 'string', 'max:255', 'min:2', 'bail'],
                        'email' => ['required', 'string', 'email', 'max:255', 'bail'],
                        'contact' => ['required', 'string', 'min:7', 'bail'],
                        'residence' => ['required', 'string', 'min:5', 'bail'],
                        'sexe' => ['required', 'string', 'bail'],
                        'birth' => ['required', 'date', 'bail'],
                        'subject_id' => ['required', 'numeric', 'bail'],
                        'month' => ['required', 'string', 'bail'],
                        'year' => ['required', 'numeric', 'bail', 'max:'.date('year')]
                    ]);
                }
                else{
                    return Validator::make($data, [
                        'name' => ['required', 'string', 'max:255', 'min:2', 'bail', 'unique:teachers'],
                        'email' => ['required', 'string', 'email', 'max:255', 'bail', 'unique:teachers'],
                        'contact' => ['required', 'string', 'min:7', 'bail'],
                        'residence' => ['required', 'string', 'min:5', 'bail'],
                        'sexe' => ['required', 'string', 'bail'],
                        'birth' => ['required', 'date', 'bail'],
                        'subject_id' => ['required', 'numeric', 'bail'],
                        'month' => ['required', 'string', 'bail'],
                        'year' => ['required', 'numeric', 'bail', 'max:'.date('Y')]
                    ]);
                }
            }

            else{
                return Validator::make($data, [
                    'name' => ['required', 'string', 'max:255', 'min:2', 'bail', 'unique:teachers'],
                    'email' => ['required', 'string', 'email', 'max:255', 'bail', 'unique:teachers'],
                    'contact' => ['required', 'string', 'min:7', 'bail'],
                    'residence' => ['required', 'string', 'min:5', 'bail'],
                    'sexe' => ['required', 'string', 'bail'],
                    'level' => ['required', 'string', 'bail'],
                    'birth' => ['required', 'date', 'bail'],
                    'subject_id' => ['required', 'numeric', 'bail'],
                    'month' => ['required', 'string', 'bail'],
                    'year' => ['required', 'numeric', 'bail', 'max:'.date('Y')]
                ]);
            }
        }
        
  
    }
}
