<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateModulo extends FormRequest
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
        
        'tramites' => 'required|array|min:1',
        'tramites.*' => 'required',
        ];
    }

    public function messages()
    {
        return [
            
            'tramites.required' => 'Debe seleccionar al menos un trámite.',
            'tramites.array' => 'El campo trámites debe ser un arreglo.',
            'tramites.min' => 'Debe seleccionar al menos un trámite.',
            'tramites.*.required' => 'Todos los trámites deben ser seleccionados.',
        ];
    }
}
