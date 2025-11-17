@extends('layouts.adminlte')

@section('title','Editar Registro Sanitario')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-3">Editar Registro Sanitario</h1>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('datos-sanitarios.update', $datoSanitario->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Animal *</label>
                    <select name="ganado_id" class="form-control" required>
                        @foreach($ganados as $g)
                            <option value="{{ $g->id }}" 
                                {{ $datoSanitario->ganado_id == $g->id ? 'selected' : '' }}>
                                {{ $g->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Vacuna</label>
                    <input type="text" name="vacuna" class="form-control"
                           value="{{ $datoSanitario->vacuna }}">
                </div>

                <div class="mb-3">
                    <label>Tratamiento</label>
                    <input type="text" name="tratamiento" class="form-control"
                           value="{{ $datoSanitario->tratamiento }}">
                </div>

                <div class="mb-3">
                    <label>Medicamento</label>
                    <input type="text" name="medicamento" class="form-control"
                           value="{{ $datoSanitario->medicamento }}">
                </div>

                <div class="mb-3">
                    <label>Fecha Aplicación</label>
                    <input type="date" name="fecha_aplicacion" class="form-control"
                           value="{{ $datoSanitario->fecha_aplicacion }}">
                </div>

                <div class="mb-3">
                    <label>Próxima Aplicación</label>
                    <input type="date" name="proxima_fecha" class="form-control"
                           value="{{ $datoSanitario->proxima_fecha }}">
                </div>

                <div class="mb-3">
                    <label>Veterinario</label>
                    <input type="text" name="veterinario" class="form-control"
                           value="{{ $datoSanitario->veterinario }}">
                </div>

                <div class="mb-3">
                    <label>Observaciones</label>
                    <textarea name="observaciones" class="form-control">{{ $datoSanitario->observaciones }}</textarea>
                </div>

                <button class="btn btn-primary">Actualizar</button>
                <a href="{{ route('datos-sanitarios.index') }}" class="btn btn-secondary">Cancelar</a>

            </form>

        </div>
    </div>

</div>
@endsection
