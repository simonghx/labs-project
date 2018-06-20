<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsersRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:users,email, '. $user->id .',id',
            'password' => 'confirmed',
            'password_confirmation' => 'required_with:password',
            'poste' => 'required',
            'role_id' => 'required',
        ];
    }

    public function messages() {
        return [
            'required' => 'Le champ :attribute est requis.',
            'unique' => 'Cet :attribute est déjà utilisé.',
            'email' => 'Votre :attribute ne respecte pas la syntaxe :email',
            'confirmed' => 'Votre :attribute doit être confirmé !'
        ];
    }
}
