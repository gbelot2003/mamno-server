<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,'. $this->id .',id'],
            'role' => ['required', 'string'],
            'telefono' => ['required', 'string'],
            'departamento_id' => ['required', 'integer'],
            'municipio_id' => ['required', 'integer'],
            'calle' => ['required', 'string'],
            'casa' => ['required', 'string'],
            'lat' => ['string', 'nullable'],
            'long' => ['string', 'nullable'],
            'identidad' => ['integer','regex:/[0-9]+/', 'nullable'],
            'rtn' => ['integer', 'regex:/[0-9]+/', 'nullable'],
            'rtn_image' => ['string', 'nullable'],
            'grupo_id' => ['integer', 'nullable'],
            'cuanta_image' => ['string', 'nullable'],
            'descripcion_vehiculos' => ['string', 'nullable'],
            'contrato' => ['integer', 'nullable'],
            'acuerdo' => ['integer', 'nullable'],
            'fautorizacion' => ['date', 'nullable'],
            'fvencimiento' => ['date', 'nullable'],
        ];
    }
}
