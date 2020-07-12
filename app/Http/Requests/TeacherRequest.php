<?php

namespace App\Http\Requests;

use App\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            $id = (int)$this->id;
            $oldNameId = (Teacher::whereName($this->name)->get()[0])->id;
            $oldEmailId = (Teacher::whereName($this->email)->get()[0])->id;
            
            if ($oldNameId == $id || $oldEmailId == $id) {
                return [
                    'name' => 'required|string|min:5|max:250|bail',
                    'email' => 'required|email|min:5|max:250|bail',
                    'contact' => 'required|string|min:5|max:250|bail',
                    'residence' => 'required|email|min:5|max:250|bail',
                    'subject_id' => 'required|numeric|bail',
                    'sexe' => 'required|string|bail',
                    'birth' => 'required|date|bail',
                    'year' => 'numeric|bail|max:'.date('year'),
                    'month' => 'string|bail',
                ];
            }
            else{
                return [
                    'name' => 'required|string|min:2|max:50|bail|unique:teachers',
                    'year' => 'numeric|bail|max:'.date('year'),
                    'month' => 'string|bail',
                    'email' => 'required|email|min:5|max:250|bail|unique:teachers',
                    'contact' => 'required|string|min:5|max:250|bail',
                    'residence' => 'required|email|min:5|max:250|bail',
                    'subject_id' => 'required|numeric|bail',
                    'sexe' => 'required|string|bail',
                    'birth' => 'required|date|bail',
                    'year' => 'numeric|bail|max:'.date('year'),
                    'month' => 'string|bail',
                ];
            }
        ];
    }
}
