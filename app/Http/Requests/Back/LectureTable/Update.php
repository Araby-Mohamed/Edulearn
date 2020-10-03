<?php

namespace App\Http\Requests\Back\LectureTable;

use Illuminate\Foundation\Http\FormRequest;

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
            'title'     => 'required|max:60|min:3',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg|max:250',
        ];
    }
}
