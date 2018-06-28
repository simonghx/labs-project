<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsletterRequest extends FormRequest
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
            'letter_email' => 'required|email|unique:newsletters',
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Le champ :attribute est requis',
            'email' => 'Veuillez entrer un :email valide',
            'unique' => 'Cet email est déjà inscrit à la newsletter.'
        ];
    }
}
