<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrganicoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
{
    return [
        'nombre' => 'required|string|max:255',
        'tipo_animal_id' => 'required|exists:tipo_animals,id',
'edad_anos' => 'required|integer|min:0|max:25',
'edad_meses' => 'required|integer|min:0|max:11',

        'peso' => 'nullable|numeric|min:0',
        'sexo' => 'nullable|string',
        'categoria_id' => 'required|exists:categorias,id',
        'descripcion' => 'nullable|string',
        'precio' => 'nullable|numeric|min:0',
        'imagen' => 'nullable|image'
    ];
}


    public function messages(): array
    {
        return [
            'categoria_id.required' => 'La categoría es obligatoria.',
            'categoria_id.exists'   => 'La categoría seleccionada no es válida.',
        ];
    }
}
