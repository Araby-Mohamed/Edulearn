<?php

namespace App\Http\Requests\Back\Admin;

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
            'username'      => 'required|max:20|min:3',
            'first_name'    => 'required|max:20|min:3',
            'last_name'     => 'required|max:20|min:3',
            'phone'         => [
                                    'required',
                                    'max:14',
                                    'min:10',
                                    Rule::unique('admins','phone')->ignore($this->route('id'))
                               ],

            'email'         => [
                                    'required',
                                    'email',
                                    'max:50',
                                    Rule::unique('admins','email')->ignore($this->route('id'))
                               ],
            'password'      => 'nullable|min:6|max:50',
            'gender'        => 'required|in:Male,Female'

        ];
    }
}
