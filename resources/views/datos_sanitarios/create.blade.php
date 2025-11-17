@extends('layouts.adminlte')

@section('title','Nuevo Registro Sanitario')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-3">Nuevo Registro Sanitario</h1>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('datos-sanitarios.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Animal</label>
                    <select name="ganado_id" class="form-control" required>
                        <option value="">Seleccione...</option>
                        @foreach($ganados as $g)
                        <option value="{{ $g->id }}">{{ $g->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Vacuna</label>
                    <input type="text" name="vacuna" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Tratamiento</label>
                    <input type="text" name="tratamiento" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Medicamento</label>
                    <input type="text" name="medicamento" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Fecha Aplicación</label>
                    <input type="date" name="fecha_aplicacion" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Próxima Fecha</label>
                    <input type="date" name="proxima_fecha" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Veterinario</label>
                    <input type="text" name="veterinario" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Observaciones</label>
                    <textarea name="observaciones" class="form-control"></textarea>
                </div>

                <button class="btn btn-success">Guardar</button>
                <a href="{{ route('datos-sanitarios.index') }}" class="btn btn-secondary">Cancelar</a>

            </form>

        </div>
    </div>

</div>
@endsection
