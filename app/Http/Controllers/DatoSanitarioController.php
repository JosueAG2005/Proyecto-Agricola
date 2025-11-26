<?php

namespace App\Http\Controllers;

use App\Models\DatoSanitario;
use App\Models\Ganado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DatoSanitarioController extends Controller
{
    public function index()
    {
        // Si es admin, mostrar todos. Si es vendedor, solo los de sus ganados
        // Cargar relaciones para mostrar información completa
        if (auth()->user()->isAdmin()) {
            $items = DatoSanitario::with(['ganado.tipoAnimal', 'ganado.raza'])
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $ganadoIds = Ganado::where('user_id', auth()->id())->pluck('id');
            $items = DatoSanitario::with(['ganado.tipoAnimal', 'ganado.raza'])
                ->whereIn('ganado_id', $ganadoIds)
                ->orderBy('id', 'desc')
                ->get();
        }
        return view('datos_sanitarios.index', compact('items'));
    }

    public function create()
    {
        // Si es admin, mostrar todos los ganados. Si es vendedor, solo los suyos
        // Incluir todos los animales registrados, con o sin fecha de publicación
        if (auth()->user()->isAdmin()) {
            $ganados = Ganado::with(['tipoAnimal', 'raza'])
                ->orderBy('nombre')
                ->get();
        } else {
            $ganados = Ganado::with(['tipoAnimal', 'raza'])
                ->where('user_id', auth()->id())
                ->orderBy('nombre')
                ->get();
        }
        return view('datos_sanitarios.create', compact('ganados'));
    }

    public function store(Request $request)
{
    $request->validate([
        'ganado_id' => 'required|exists:ganados,id',
        'vacuna' => 'nullable|string',
        'vacunado_fiebre_aftosa' => 'nullable|boolean',
        'vacunado_antirabica' => 'nullable|boolean',
        'tratamiento' => 'nullable|string',
        'medicamento' => 'nullable|string',
        'fecha_aplicacion' => 'nullable|date',
        'proxima_fecha' => 'nullable|date',
        'veterinario' => 'nullable|string',
        'observaciones' => 'nullable|string',
        'certificado_imagen' => 'nullable|image|max:5120', // 5MB máximo
        'destino_matadero_campo' => 'nullable|string|max:255',
        'hoja_ruta_foto' => 'nullable|image|max:5120', // 5MB máximo
        'marca_ganado' => 'nullable|string|max:255',
        'senal_numero' => 'nullable|string|max:255',
        'nombre_dueño' => 'nullable|string|max:255',
        'carnet_dueño_foto' => 'nullable|image|max:5120', // 5MB máximo
    ]);

    // Verificar que el ganado pertenece al vendedor (si no es admin)
    if (!auth()->user()->isAdmin()) {
        $ganado = Ganado::findOrFail($request->ganado_id);
        if ($ganado->user_id !== auth()->id()) {
            return redirect()->route('admin.datos-sanitarios.create')
                ->with('error', 'No tienes permisos para crear datos sanitarios para este animal.');
        }
    }

    // Preparar los datos
    $data = $request->only([
        'ganado_id',
        'vacuna',
        'vacunado_fiebre_aftosa',
        'vacunado_antirabica',
        'tratamiento',
        'medicamento',
        'fecha_aplicacion',
        'proxima_fecha',
        'veterinario',
        'observaciones',
        'destino_matadero_campo',
        'marca_ganado',
        'senal_numero',
        'nombre_dueño'
    ]);

    // Convertir checkboxes a boolean (si vienen como null, serán false)
    $data['vacunado_fiebre_aftosa'] = $request->has('vacunado_fiebre_aftosa') ? true : false;
    $data['vacunado_antirabica'] = $request->has('vacunado_antirabica') ? true : false;

    // Manejar la imagen del certificado
    if ($request->hasFile('certificado_imagen')) {
        $data['certificado_imagen'] = $request->file('certificado_imagen')->store('certificados_senasag', 'public');
    }

    // Manejar la imagen de la hoja de ruta
    if ($request->hasFile('hoja_ruta_foto')) {
        $data['hoja_ruta_foto'] = $request->file('hoja_ruta_foto')->store('hojas_ruta', 'public');
    }

    // Manejar la imagen del carnet del dueño
    if ($request->hasFile('carnet_dueño_foto')) {
        $data['carnet_dueño_foto'] = $request->file('carnet_dueño_foto')->store('carnets_dueños', 'public');
    }

    // Crear el dato sanitario
    $datoSanitario = DatoSanitario::create($data);

    // Actualizar el ganado con el dato_sanitario_id
    $ganado = Ganado::findOrFail($request->ganado_id);
    $ganado->update(['dato_sanitario_id' => $datoSanitario->id]);

    return redirect()->route('admin.datos-sanitarios.index')
        ->with('success', 'Registro sanitario guardado correctamente.');
}


   public function edit(DatoSanitario $datos_sanitario)
{
    // Si es admin, mostrar todos los ganados. Si es vendedor, solo los suyos
    // Incluir todos los animales registrados, con o sin fecha de publicación
    if (auth()->user()->isAdmin()) {
        $ganados = Ganado::with(['tipoAnimal', 'raza'])
            ->orderBy('nombre')
            ->get();
    } else {
        $ganados = Ganado::with(['tipoAnimal', 'raza'])
            ->where('user_id', auth()->id())
            ->orderBy('nombre')
            ->get();
    }

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
        'vacunado_fiebre_aftosa' => 'nullable|boolean',
        'vacunado_antirabica' => 'nullable|boolean',
        'tratamiento' => 'nullable|string',
        'medicamento' => 'nullable|string',
        'fecha_aplicacion' => 'nullable|date',
        'proxima_fecha' => 'nullable|date',
        'veterinario' => 'nullable|string',
        'observaciones' => 'nullable|string',
        'certificado_imagen' => 'nullable|image|max:5120', // 5MB máximo
        'destino_matadero_campo' => 'nullable|string|max:255',
        'hoja_ruta_foto' => 'nullable|image|max:5120', // 5MB máximo
        'marca_ganado' => 'nullable|string|max:255',
        'senal_numero' => 'nullable|string|max:255',
        'nombre_dueño' => 'nullable|string|max:255',
        'carnet_dueño_foto' => 'nullable|image|max:5120', // 5MB máximo
    ]);

    // Verificar que el ganado pertenece al vendedor (si no es admin)
    if (!auth()->user()->isAdmin()) {
        $ganado = Ganado::findOrFail($request->ganado_id);
        if ($ganado->user_id !== auth()->id()) {
            return redirect()->route('admin.datos-sanitarios.edit', $datos_sanitario)
                ->with('error', 'No tienes permisos para editar datos sanitarios de este animal.');
        }
    }

    // Si cambió el ganado, actualizar el ganado anterior y el nuevo
    if ($datos_sanitario->ganado_id != $request->ganado_id) {
        // Limpiar el dato_sanitario_id del ganado anterior
        $ganadoAnterior = Ganado::find($datos_sanitario->ganado_id);
        if ($ganadoAnterior) {
            $ganadoAnterior->update(['dato_sanitario_id' => null]);
        }
        
        // Asignar el dato_sanitario_id al nuevo ganado
        $ganadoNuevo = Ganado::findOrFail($request->ganado_id);
        $ganadoNuevo->update(['dato_sanitario_id' => $datos_sanitario->id]);
    }

    // Preparar los datos
    $data = $request->only([
        'ganado_id',
        'vacuna',
        'vacunado_fiebre_aftosa',
        'vacunado_antirabica',
        'tratamiento',
        'medicamento',
        'fecha_aplicacion',
        'proxima_fecha',
        'veterinario',
        'observaciones',
        'destino_matadero_campo',
        'marca_ganado',
        'senal_numero',
        'nombre_dueño'
    ]);

    // Convertir checkboxes a boolean
    $data['vacunado_fiebre_aftosa'] = $request->has('vacunado_fiebre_aftosa') ? true : false;
    $data['vacunado_antirabica'] = $request->has('vacunado_antirabica') ? true : false;

    // Manejar la imagen del certificado
    if ($request->hasFile('certificado_imagen')) {
        // Eliminar la imagen anterior si existe
        if ($datos_sanitario->certificado_imagen && Storage::disk('public')->exists($datos_sanitario->certificado_imagen)) {
            Storage::disk('public')->delete($datos_sanitario->certificado_imagen);
        }
        $data['certificado_imagen'] = $request->file('certificado_imagen')->store('certificados_senasag', 'public');
    }

    // Manejar la imagen de la hoja de ruta
    if ($request->hasFile('hoja_ruta_foto')) {
        // Eliminar la imagen anterior si existe
        if ($datos_sanitario->hoja_ruta_foto && Storage::disk('public')->exists($datos_sanitario->hoja_ruta_foto)) {
            Storage::disk('public')->delete($datos_sanitario->hoja_ruta_foto);
        }
        $data['hoja_ruta_foto'] = $request->file('hoja_ruta_foto')->store('hojas_ruta', 'public');
    }

    // Manejar la imagen del carnet del dueño
    if ($request->hasFile('carnet_dueño_foto')) {
        // Eliminar la imagen anterior si existe
        if ($datos_sanitario->carnet_dueño_foto && Storage::disk('public')->exists($datos_sanitario->carnet_dueño_foto)) {
            Storage::disk('public')->delete($datos_sanitario->carnet_dueño_foto);
        }
        $data['carnet_dueño_foto'] = $request->file('carnet_dueño_foto')->store('carnets_dueños', 'public');
    }

    $datos_sanitario->update($data);

    return redirect()->route('admin.datos-sanitarios.index')
        ->with('success', 'Registro sanitario actualizado correctamente.');
}


    public function destroy(DatoSanitario $datos_sanitario)
    {
        // Verificar permisos: solo el dueño del ganado o admin puede eliminar
        if (!auth()->user()->isAdmin()) {
            $ganado = $datos_sanitario->ganado;
            if ($ganado && $ganado->user_id !== auth()->id()) {
                return redirect()->route('admin.datos-sanitarios.index')
                    ->with('error', 'No tienes permisos para eliminar este registro sanitario.');
            }
        }

        // Limpiar el dato_sanitario_id del ganado antes de eliminar
        $ganado = $datos_sanitario->ganado;
        if ($ganado) {
            $ganado->update(['dato_sanitario_id' => null]);
        }

        // Eliminar las imágenes si existen
        if ($datos_sanitario->certificado_imagen && Storage::disk('public')->exists($datos_sanitario->certificado_imagen)) {
            Storage::disk('public')->delete($datos_sanitario->certificado_imagen);
        }
        if ($datos_sanitario->hoja_ruta_foto && Storage::disk('public')->exists($datos_sanitario->hoja_ruta_foto)) {
            Storage::disk('public')->delete($datos_sanitario->hoja_ruta_foto);
        }
        if ($datos_sanitario->carnet_dueño_foto && Storage::disk('public')->exists($datos_sanitario->carnet_dueño_foto)) {
            Storage::disk('public')->delete($datos_sanitario->carnet_dueño_foto);
        }

        $datos_sanitario->delete();

        return redirect()->route('admin.datos-sanitarios.index')
            ->with('success', 'Registro sanitario eliminado.');
    }
}
