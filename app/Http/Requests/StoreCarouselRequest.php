<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarouselRequest extends FormRequest
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
            'image' => 'required|image|max:200000',
            'name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Le champ :attribute est requis.',
            'image'  => ':attribute doit être un fichier image (jpeg, png, bmp, gif, ou svg)',
            'max'  => ':attribute ne doit pas dépasser les :max octets.',
        
        ];
    }
}
