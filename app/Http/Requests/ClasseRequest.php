<?php

namespace App\Http\Requests;

use App\Models\Classe;
use Illuminate\Foundation\Http\FormRequest;

class ClasseRequest extends FormRequest
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
        $id = (int)$this->id;
        $old = (Classe::whereName($this->name)->get()[0])->id;
        
        if ($old == $id) {
            return [
                'name' => 'required|string|min:2|max:50|bail',
                'year' => 'numeric|bail|max:'.date('year'),
                'month' => 'string|bail',
            ];
        }
        else{
            return [
                'name' => 'required|string|min:2|max:50|bail|unique:classes',
                'year' => 'numeric|bail|max:'.date('year'),
                'month' => 'string|bail',
            ];
        }
        
    }
}
