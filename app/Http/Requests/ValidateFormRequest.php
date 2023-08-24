<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFormRequest extends FormRequest
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
            'nom' => 'required|min:3',
            'email' => 'required|email',
            
            
        ];
    }
    public function messages()
{
    return [
        'nom.required' => 'le champ nom est  requirs',
        'nom.min' => 'le champ nom doit contenir au moins 3 caracteres ',
        
        'email.required' => 'le champ email est requis',
        'email.email' => 'le champ email doit etre de type email ',
    ];
}
}
