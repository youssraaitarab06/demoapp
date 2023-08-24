<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'titre'=>'required|min:3',
            'description'=>'required|min:5',
            'dateD'=>'required|date|after_or_equal:today',
            'dateF'=>'required|date|after:dateD',
        ];
    }
    public function messages()
    {
        return [
            'titre.required' => 'le champ titre est  requirs',
            'titre.min' => 'le champ titre doit contenir au moins 3 caracteres ',
            ' description.required' => 'le champ  description est  requirs',
            ' description.min' => 'le champ  description doit contenir au moins 5 caracteres ',
            'dateD.required' => 'la date de debut  est  requirs',
            'dateF.required' => 'la date de fin est  requirs',
            'dateD.date' => 'la date de debut  doit etre de type date ',
            'dateD.after_or_equal:today' => 'la date after today',
            'dateF.after:dateD' => 'la date after:dateD ',
           
        ];
    }
}
