<?php

namespace App\Http\Requests\Back\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Update extends FormRequest
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
            'ssn'           => [
                                    'required','numeric','digits:14',
                                    Rule::unique('users','ssn')->ignore($this->route('student'))
                               ],
            'first_name'    =>      'required|max:20|min:3',
            'last_name'     =>      'required|max:20|min:3',
            'phone'         => [
                                    'required',
                                    'max:14',
                                    'min:10',
                                     Rule::unique('users','phone')->ignore($this->route('student'))
                                ],
            'email'         =>  [
                                    'required',
                                    'email',
                                    'max:50',
                                    Rule::unique('users','email')->ignore($this->route('student'))
                                ],
            'address'       =>      'required|max:100|min:10',
            'birthDate'     =>      'required|date',
            'password'      =>      'nullable|min:6|max:50',
            'gender'        =>      'required|in:Male,Female',
            'image'         =>      'nullable|image|mimes:jpeg,png,jpg|max:250'
        ];
    }
}
