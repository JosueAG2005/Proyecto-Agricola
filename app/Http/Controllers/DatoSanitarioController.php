<?php

namespace App\Http\Controllers;

use App\Models\DatoSanitario;
use App\Models\Ganado;
use Illuminate\Http\Request;

class DatoSanitarioController extends Controller
{
    public function index()
    {
        $items = DatoSanitario::with('ganado')->orderBy('id', 'desc')->get();
        return view('datos_sanitarios.index', compact('items'));
    }

    public function create()
    {
        $ganados = Ganado::orderBy('nombre')->get();
        return view('datos_sanitarios.create', compact('ganados'));
    }

    public function store(Request $request)
{
    $request->validate([
        'vacuna' => 'nullable|string',
        'tratamiento' => 'nullable|string',
        'medicamento' => 'nullable|string',
        'fecha_aplicacion' => 'nullable|date',
        'proxima_fecha' => 'nullable|date',
        'veterinario' => 'nullable|string',
        'observaciones' => 'nullable|string',
    ]);

    DatoSanitario::create($request->all());

    return redirect()->route('datos-sanitarios.index')
        ->with('success', 'Registro sanitario guardado correctamente.');
}


   public function edit(DatoSanitario $datos_sanitario)
{
    $ganados = Ganado::orderBy('nombre')->get();

    return view('datos_sanitarios.edit', [
        'datoSanitario' => $datos_sanitario, // renombramos aquí
        'ganados' => $ganados
    ]);
}


   public function update(Request $request, DatoSanitario $datos_sanitario)
{
    $request->validate([
        'ganado_id' => 'required|exists:ganados,id',
        'vacuna' => 'nullable|string',
        'tratamiento' => 'nullable|string',
        'medicamento' => 'nullable|string',
        'fecha_aplicacion' => 'nullable|date',
        'proxima_fecha' => 'nullable|date',
        'veterinario' => 'nullable|string',
        'observaciones' => 'nullable|string'
    ]);

    $datos_sanitario->update($request->all());

    return redirect()->route('datos-sanitarios.index')
        ->with('success', 'Registro sanitario actualizado correctamente.');
}


    public function destroy(DatoSanitario $datoSanitario)
    {
        $datoSanitario->delete();

        return redirect()->route('datos-sanitarios.index')
            ->with('success', 'Registro sanitario eliminado.');
    }
}
