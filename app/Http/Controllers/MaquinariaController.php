<?php

namespace App\Http\Controllers;

use App\Models\Maquinaria;
use App\Http\Requests\StoreMaquinariaRequest;
use App\Http\Requests\UpdateMaquinariaRequest;

class MaquinariaController extends Controller
{
    public function index()
    {
        $q = request('q');
        $maquinarias = Maquinaria::when($q, fn($qb) =>
                $qb->where('nombre','ilike',"%$q%")
                   ->orWhere('tipo','ilike',"%$q%")
                   ->orWhere('marca','ilike',"%$q%"))
            ->orderBy('id','desc')
            ->paginate(10)
            ->withQueryString();

        return view('maquinarias.index', compact('maquinarias','q'));
    }

    public function create()
    {
        return view('maquinarias.create');
    }

    public function store(StoreMaquinariaRequest $request)
    {
        Maquinaria::create($request->validated());
        return redirect()->route('maquinarias.index')->with('ok','Maquinaria creada');
    }

    public function show(Maquinaria $maquinaria)
    {
        return view('maquinarias.show', compact('maquinaria'));
    }

    public function edit(Maquinaria $maquinaria)
    {
        return view('maquinarias.edit', compact('maquinaria'));
    }

    public function update(UpdateMaquinariaRequest $request, Maquinaria $maquinaria)
    {
        $maquinaria->update($request->validated());
        return redirect()->route('maquinarias.index')->with('ok','Maquinaria actualizada');
    }

    public function destroy(Maquinaria $maquinaria)
    {
        $maquinaria->delete();
        return redirect()->route('maquinarias.index')->with('ok','Maquinaria eliminada');
    }
}
