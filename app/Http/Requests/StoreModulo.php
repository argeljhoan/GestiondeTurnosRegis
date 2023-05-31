<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreModulo extends FormRequest
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
        'name' => 'required|string|max:255|unique:modulos,nameModulo',
        'tramites' => 'required|array|min:1',
        'tramites.*' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre del módulo es obligatorio.',
            'name.string' => 'El campo nombre del módulo debe ser una cadena de caracteres.',
            'name.max' => 'El campo nombre del módulo no debe exceder los 255 caracteres.',
            'name.unique' => 'El nombre del módulo ya está en uso. Por favor, elija otro nombre.',
            'tramites.required' => 'Debe seleccionar al menos un trámite.',
            'tramites.array' => 'El campo trámites debe ser un arreglo.',
            'tramites.min' => 'Debe seleccionar al menos un trámite.',
            'tramites.*.required' => 'Todos los trámites deben ser seleccionados.',
        ];
    }

}
