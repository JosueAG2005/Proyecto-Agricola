@extends('layouts.adminlte')

@section('title','Datos Sanitarios')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Datos Sanitarios</h1>
        <a href="{{ route('datos-sanitarios.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle"></i> Nuevo Registro
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">

            <table class="table table-bordered table-striped mb-0">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Animal</th>
                        <th>Vacuna</th>
                        <th>Tratamiento</th>
                        <th>Fecha Aplicación</th>
                        <th>Próxima Fecha</th>
                        <th style="width:140px;">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->ganado->nombre }}</td>
                        <td>{{ $item->vacuna ?? '—' }}</td>
                        <td>{{ $item->tratamiento ?? '—' }}</td>
                        <td>{{ $item->fecha_aplicacion ?? '—' }}</td>
                        <td>{{ $item->proxima_fecha ?? '—' }}</td>

                        <td>
                            <a href="{{ route('datos-sanitarios.edit',$item->id) }}"
                                class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('datos-sanitarios.destroy',$item->id) }}"
                                method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Eliminar registro?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>
</div>
@endsection
