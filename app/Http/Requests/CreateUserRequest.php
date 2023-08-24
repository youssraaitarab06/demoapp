<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'nom'=>'required|min:3',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:3',
            'photo'=>'file|mimes:png,jpg,jpeg|max:400',
        ];
    }
    public function messages()
    {
        return [
            'nom.required' => 'le champ nom est  requirs',
            'nom.min' => 'le nom doit contenir au moins 3 caracteres ',
            'email.required' => 'l\'email est  requirs',
            'email.unique' => 'l\'email est  deja existe',
            'password.required' => 'le password est  requirs',
            'password.min' => 'le mot de passe doit contenir au moins 5 caracteres ',
           
        ];
    }
}
