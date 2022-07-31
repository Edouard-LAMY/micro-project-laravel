<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'name' => 'required|max:40',
            'email' => 'required',
            'phone' => 'required',
            'content' => 'max:250',
            'objet' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.max' => 'Le nom ne doit pas contenir plus de 30 caractères.',
            'name.required' => 'Votre nom est obligatoire.',
            'email.required' => 'Votre email est obligatoire.',
            'phone.required' => 'Le numéro de téléphone est obligatoire.',
            'content.max' => 'Votre texte est trop long, veuiller diminuer votre demande s\'il vous plaît.',
            'objet.required' => 'Un objet est obligatoire.'
        ];
    }
}
