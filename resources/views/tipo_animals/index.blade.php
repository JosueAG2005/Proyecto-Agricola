@extends('layouts.adminlte')

@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center">
        <h3 class="card-title">Tipos de Animales</h3>

        <form method="get" class="form-inline ml-auto">
            <input type="text" name="q" class="form-control form-control-sm mr-2" placeholder="Buscar..." value="{{ $q }}">
            <button class="btn btn-sm btn-primary">Buscar</button>
        </form>

        <a href="{{ route('tipo_animals.create') }}" class="btn btn-sm btn-success ml-2">Nuevo</a>
    </div>

    <div class="card-body p-0">
        @if(session('ok'))
        <div class="alert alert-success m-3">{{ session('ok') }}</div>
        @endif

        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th class="text-right pr-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($items as $i)
                <tr>
                    <td>{{ $i->id }}</td>
                    <td>{{ $i->nombre }}</td>
                    <td>{{ $i->descripcion }}</td>
                    <td class="text-right pr-3">
                        <a href="{{ route('tipo_animals.edit', $i) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('tipo_animals.destroy', $i) }}" method="post" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        {{ $items->links() }}
    </div>
</div>
@endsection
