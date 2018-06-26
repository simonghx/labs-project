<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjetRequest extends FormRequest
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
            'titre' => 'required|max:255',
            'content' => 'required',
            'image' => 'image|max:200000',
            'icon' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Le champ :attribute est requis.',
            'image'  => ':attribute doit être un fichier image (jpeg, png, bmp, gif, ou svg)',
            'image.max'  => ':attribute ne doit pas dépasser les :max octets.',
            'max'  => ':attribute ne doit pas dépasser les :max caractères.',
        ];
    }
}
