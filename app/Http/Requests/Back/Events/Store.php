<?php

namespace App\Http\Requests\Back\Events;

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
            'title'     => 'required|max:200|min:3',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg|max:250',
            'content'   => 'required|min:10',
        ];
    }
}
