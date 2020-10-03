<?php

namespace App\Http\Requests\Back\Student;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'ssn'           => 'required|numeric|digits:14|unique:users',
            'first_name'    => 'required|max:20|min:3',
            'last_name'     => 'required|max:20|min:3',
            'phone'         => 'required|max:14|min:10|unique:users',
            'email'         => 'required|email|unique:users|max:50',
            'address'       => 'required|max:100|min:10',
            'birthDate'     => 'required|date',
            'password'      => 'required|min:6|max:50',
            'gender'        => 'required|in:Male,Female',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg|max:250',
            'subject_id'    => 'required|min:1',
        ];
    }

    public function messages()
    {
        return [
            'subject_id.*' => 'Please Select Subject'
        ];
    }
}
