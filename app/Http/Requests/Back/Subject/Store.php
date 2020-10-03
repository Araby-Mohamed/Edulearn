<?php

namespace App\Http\Requests\Back\Subject;

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
            'name'     => 'required|max:60|min:3',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg|max:250',
            'user_id'  => 'numeric',
            'code'     => 'string|size:5|unique:subject',
        ];
    }
}
