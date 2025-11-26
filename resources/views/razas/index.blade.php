@extends('layouts.adminlte')

@section('title', 'Razas')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Razas</h1>
        <a href="{{ route('admin.razas.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle"></i> Nueva Raza
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
                        <th>Nombre</th>
                        <th>Tipo de Animal</th>
                        <th>Descripción</th>
                        <th style="width: 150px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($razas as $raza)
                        <tr>
                            <td>{{ $raza->id }}</td>
                            <td>{{ $raza->nombre }}</td>
                            <td>{{ $raza->tipoAnimal->nombre ?? '—' }}</td>
                            <td>{{ $raza->descripcion ?? '—' }}</td>
                            <td>
                                <a href="{{ route('admin.razas.edit', $raza->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.razas.destroy', $raza->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar raza?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No hay razas registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $razas->links() }}
        </div>
    </div>
</div>
@endsection
