<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UniversiteRequest extends FormRequest
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
            'university-name' => 'required|min:5',
            'university-sigle' => 'required|min:3',
            'university-country-location' => 'required|min:3',
            'university-city-location' => 'required',
            'university-email' => 'required|unique:universites,email|min:8',
            'university-phone' => 'required',
            'logo' =>'required|image|mimes:jpeg,png,jpg|max:2048',
            'exampleFormControlTextarea1' => 'required|min:5'
        ];
    }

    public function messages()
    {
        return [
            'university-name.required' => 'Veuillez indiquer un nom pour votre université',
            'university-sigle.required' => 'Sigle is required',
            'university-email.unique' => 'Cet email est deja utilisé',
        ];
    }
}
