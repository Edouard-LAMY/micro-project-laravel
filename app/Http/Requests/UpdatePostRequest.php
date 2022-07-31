<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:30',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.max' => 'Le titre ne doit pas contenir plus de 30 caractères.',
            'title.required' => 'Un titre est obligatoire.',
            'content.required' => 'Un texte est obligatoire.'
        ];
    }
}
