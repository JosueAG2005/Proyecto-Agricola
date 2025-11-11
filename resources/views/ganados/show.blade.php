@extends('layouts.adminlte')

@section('title', 'Detalle de Ganado')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Detalle del Ganado</h1>
        <a href="{{ route('ganados.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if($ganado->imagen)
                        <img src="{{ asset('storage/'.$ganado->imagen) }}" alt="Imagen de {{ $ganado->nombre }}" class="img-fluid rounded shadow-sm" style="max-height: 250px;">
                    @else
                        <div class="text-muted">Sin imagen</div>
                    @endif
                </div>

                <div class="col-md-8">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <td>{{ $ganado->id }}</td>
                        </tr>
                        <tr>
                            <th>Nombre</th>
                            <td>{{ $ganado->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Tipo</th>
                            <td>{{ $ganado->tipo }}</td>
                        </tr>
                        <tr>
                            <th>Edad (meses)</th>
                            <td>{{ $ganado->edad ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Peso (kg)</th>
                            <td>{{ $ganado->peso ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Sexo</th>
                            <td>{{ $ganado->sexo ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Categoría</th>
                            <td>{{ $ganado->categoria->nombre ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Descripción</th>
                            <td>{{ $ganado->descripcion ?? '—' }}</td>
                        </tr>
                        <tr>
                            <th>Precio (Bs)</th>
                            <td>{{ $ganado->precio ? number_format($ganado->precio, 2) : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Registro</th>
                            <td>{{ $ganado->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
