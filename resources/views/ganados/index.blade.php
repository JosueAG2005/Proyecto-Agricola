@extends('layouts.adminlte')

@section('title', 'Gestión de Ganado')

@section('content')

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Lista de Ganado</h1>
        <a href="{{ route('ganados.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle"></i> Nuevo Registro
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">

            <table class="table table-bordered table-striped mb-0">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tipo de Animal</th>
                        <th>Raza</th>
                        <th>Edad</th>
                        <th>Tipo de Peso</th>
                        <th>Sexo</th>
                        <th>Categoría</th>
                        <th>Ubicación</th>
                        <th>Fecha Publicación</th>
                        <th>Datos Sanitarios</th>
                        <th>Precio (Bs)</th>
                        <th>Imagen</th>
                        <th style="width:150px;">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($ganados as $ganado)
                        <tr>
                            <td>{{ $ganado->id }}</td>
                            <td>{{ $ganado->nombre }}</td>

                            <td>{{ $ganado->tipoAnimal->nombre ?? '—' }}</td>
                            <td>{{ $ganado->raza->nombre ?? '—' }}</td>

                            <td>{{ $ganado->edad ?? '-' }} meses</td>

                            <td>{{ $ganado->tipoPeso->nombre ?? '-' }}</td>

                            <td>{{ $ganado->sexo ?? '-' }}</td>

                            <td>{{ $ganado->categoria->nombre ?? '-' }}</td>

                            <td>{{ $ganado->ubicacion ?? 'Sin ubicación' }}</td>

                            <td>
                                {{ $ganado->fecha_publicacion
                                    ? \Carbon\Carbon::parse($ganado->fecha_publicacion)->format('d/m/Y')
                                    : 'No publicada' }}
                            </td>

                            <td>
                               {{ $ganado->datoSanitario->vacuna ?? 'Sin registro' }}

                            </td>

                            <td>{{ $ganado->precio ? number_format($ganado->precio, 2) : '-' }}</td>

                            <td>
                                @if($ganado->imagen)
                                    <img src="{{ asset('storage/'.$ganado->imagen) }}" width="60" alt="imagen">
                                @else
                                    <span class="text-muted">Sin imagen</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('ganados.edit', $ganado->id) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('ganados.destroy', $ganado->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Eliminar este registro?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="15" class="text-center text-muted">
                                No hay registros de ganado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>

        <div class="card-footer">
            {{ $ganados->links() }}
        </div>

    </div>
</div>

@endsection
