<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return [
            
            'email'=>'required|email',
            'password'=>'required|min:3',
        ];
    }
    public function messages()
    {
        return [
            
            'email.required' => 'l\'email est  requirs',
            'password.required' => 'le password est  requirs',
            'password.min' => 'le mot de passe doit contenir au moins 5 caracteres ',
           
        ];
    }
}
