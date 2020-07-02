<?php

namespace App\Http\Requests;

use App\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;

class SecondaryTeachersRequest extends FormRequest
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
        $teacher = Teacher::find((int)$id);
        // $input = $request->except(['classe', 'id']);

        if ($this->name !== null && $this->name !== "") {
            $thisNameExist = Teacher::whereName($this->name)->get()->toArray();
            if ($thisNameExist !== []) {
                $oldNameId = (Teacher::whereName($this->name)->get()[0])->id;
            }
            else{
                $oldNameId = null;
            }
        }
        else{
            $oldNameId = null;
        }
        if ($this->email !== null && $this->email !== "") {
            $thisEmailExist = Teacher::whereEmail($this->email)->get()->toArray();
            if ($thisEmailExist !== []) {
                $oldEmailId = (Teacher::whereEmail($this->email)->get()[0])->id;
            }
            else{
                $oldEmailId = null;
            }
        }
        else{
            $oldEmailId = null;
        }

        if ($oldNameId == $id || $oldEmailId == $id) {
            
        return [
                'name' => 'required|string|min:5|max:250|bail',
                'email' => 'required|email|min:5|max:250|bail',
                'contact' => 'required|string|min:7|max:250|bail',
                'residence' => 'required|string|min:3|max:250|bail',
                'sexe' => 'required|string|bail',
                'level' => 'required|string|bail',
                'birth' => 'required|date|bail',
                'year' => 'required|numeric|bail|max:'.date('year'),
                'month' => 'required|string|bail',
            ];
        }
        else{
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
                'year' => 'required|numeric|bail|max:'.date('year'),
                'month' => 'required|string|bail',
            ];

        }    
    }
}
