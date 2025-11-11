<?php

namespace App\Http\Controllers;

use App\Models\Ganado;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GanadoController extends Controller
{
    /**
     * Muestra la lista de ganado.
     */
    public function index()
    {
        $ganados = Ganado::with('categoria')->orderBy('id', 'desc')->paginate(10);
        return view('ganados.index', compact('ganados'));
    }

    /**
     * Muestra el formulario de creación.
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('ganados.create', compact('categorias'));
    }

    /**
     * Guarda un nuevo registro.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string',
            'edad' => 'nullable|integer|min:0',
            'peso' => 'nullable|numeric|min:0',
            'sexo' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'precio' => 'nullable|numeric|min:0',
            'imagen' => 'nullable|image|max:2048',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('ganados', 'public');
        }

        Ganado::create($data);

        return redirect()->route('ganados.index')->with('success', 'Ganado registrado correctamente.');
    }

    /**
     * Muestra un registro específico.
     */
    public function show(Ganado $ganado)
    {
        return view('ganados.show', compact('ganado'));
    }

    /**
     * Muestra el formulario de edición.
     */
    public function edit(Ganado $ganado)
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('ganados.edit', compact('ganado', 'categorias'));
    }

    /**
     * Actualiza un registro existente.
     */
    public function update(Request $request, Ganado $ganado)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string',
            'edad' => 'nullable|integer|min:0',
            'peso' => 'nullable|numeric|min:0',
            'sexo' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'precio' => 'nullable|numeric|min:0',
            'imagen' => 'nullable|image|max:2048',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('imagen')) {
            // Eliminar imagen anterior si existe
            if ($ganado->imagen && Storage::disk('public')->exists($ganado->imagen)) {
                Storage::disk('public')->delete($ganado->imagen);
            }
            $data['imagen'] = $request->file('imagen')->store('ganados', 'public');
        }

        $ganado->update($data);

        return redirect()->route('ganados.index')->with('success', 'Registro actualizado correctamente.');
    }

    /**
     * Elimina un registro.
     */
    public function destroy(Ganado $ganado)
    {
        if ($ganado->imagen && Storage::disk('public')->exists($ganado->imagen)) {
            Storage::disk('public')->delete($ganado->imagen);
        }

        $ganado->delete();
        return redirect()->route('ganados.index')->with('success', 'Ganado eliminado correctamente.');
    }
}
