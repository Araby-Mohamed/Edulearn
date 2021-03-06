<?php

namespace App\Http\Requests\Front\Material;

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
            'lecture'   => 'required|min:3|max:30',
            'content'   => 'nullable|min:6',
            'file'      => 'required|file|mimes:pdf,docx|max:3000',
            'subject_id'=> 'required|numeric'
        ];
    }
}
