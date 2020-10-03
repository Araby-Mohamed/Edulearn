<?php

namespace App\Http\Requests\Front\Exam;

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
            'title'      => 'required|min:3|max:150',
            'file'       => 'nullable|file|mimes:pdf,docx|max:3000',
            'subject_id' => 'required|numeric'
        ];
    }
}
