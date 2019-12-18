<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContent extends FormRequest
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
            'title' => ['required', 'max:100'],
            'description' => ['required', 'max:2000'],
            'type' => ['required', 'max:20']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages() {
        return [
            'title.required' => 'Por favor, escriba el titulo del contenido.',
            'title.max' => 'El maximo de caracteres para el titulo del contenido es de: 100.',
            'description.required' => 'Por favor, escriba la descripcion del contenido.',
            'description.max' => 'El maximo de caracteres para la descripcion del contenido es de: 2000.',
            'type.required' => 'Por favor, escriba un tipo de contenido.',
            'type.max' => 'El maximo de caracteres para el tipo de contenido es de: 20.'
        ];
    }
}
