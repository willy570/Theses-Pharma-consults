<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class theseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'these-title' =>'required|min:3',
            'these-author' =>'required',
            'these-file' =>'required|mimes:pdf,xlx,csv|max:2048',
            'these-departement' =>'required',
            'these-ufrs' =>'required',
            'university-name' =>'required',
        ];
    }


    public function messages()
    {
        return [
            'these-title' =>'titre de la thèse',
            'these-author' =>'auteur de la thèse',
            'these-file' =>'fichier pdf',
            'these-departement' =>'required',
            'these-ufrs' =>'required',
            'university-name' =>'required'
        ];
    }
}
