<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class disciplineRequest extends FormRequest
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
            'departement-name' =>'required|min:3',
            'university-name' =>'required',
            'university-ufr' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'departement-name' =>'Entrer le nom du departement',
        ];
    }
}
