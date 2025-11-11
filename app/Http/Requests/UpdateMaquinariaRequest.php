<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMaquinariaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:120',
            'tipo' => 'required|string|max:60',
            'marca' => 'required|string|max:60',
            'modelo' => 'nullable|string|max:60',
            'precio_dia' => 'required|numeric|min:0',
            'estado' => 'required|in:disponible,en_mantenimiento,dado_baja',
            'descripcion' => 'nullable|string|max:2000',
        ];
    }

}
