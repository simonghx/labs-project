<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'contenu' => 'required',
            'image' => 'image|max:200000',
            'categorie_id' => 'required',
            'tags_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Le champ :attribute est requis.',
            'unique' => 'Cet :attribute est déjà utilisé.',
            'confirmed' => 'Votre :attribute doit être confirmé !',
            'image'  => ':attribute doit être un fichier image (jpeg, png, bmp, gif, ou svg)',
            'max'  => ':attribute ne doit pas dépasser les :max caractères.',
        ];
    }
}
