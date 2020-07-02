<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeachersRequest extends FormRequest
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
        $level = $this->level;
        if ($level == 'primary') {
            
        return [
                'name' => 'required|string|min:2|max:50|bail|unique:teachers',
                'year' => 'numeric|bail|max:'.date('year'),
                'email' => 'required|email|min:5|max:250|bail|unique:teachers',
                'contact' => 'required|string|min:7|max:250|bail',
                'residence' => 'required|string|min:3|max:250|bail',
                'classe' => 'numeric|bail',
                'sexe' => 'required|string|bail',
                'level' => 'required|string|bail',
                'birth' => 'required|date|bail',
                'month' => 'required|string|bail',
                'year' => 'required|numeric|bail|max:'.date('year'),
            ];
        }
        elseif($level == 'secondary'){
            return [
                'name' => 'required|string|min:2|max:50|bail|unique:teachers',
                'year' => 'numeric|bail|max:'.date('year'),
                'email' => 'required|email|min:5|max:250|bail|unique:teachers',
                'contact' => 'required|string|min:7|max:250|bail',
                'residence' => 'required|string|min:3|max:250|bail',
                'subject_id' => 'required|numeric|bail',
                'sexe' => 'required|string|bail',
                'level' => 'required|string|bail',
                'birth' => 'required|date|bail',
                'month' => 'required|string|bail',
                'year' => 'required|numeric|bail|max:'.date('year'),
            ];

        }    
    }
}
