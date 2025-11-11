@extends('layouts.gentelella')

@section('content')
<div class="x_panel">
  <div class="x_title">
    <h2>Categorías</h2>
    <div class="clearfix"></div>
  </div>

  <div class="x_content">
    <div class="row mb-3">
      <div class="col-md-4">
        <form action="{{ route('categorias.index') }}" method="GET">
          <div class="input-group">
            <input type="text" name="buscar" class="form-control" placeholder="Buscar..." value="{{ request('buscar') }}">
            <span class="input-group-btn">
              <button class="btn btn-success" type="submit">Buscar</button>
            </span>
          </div>
        </form>
      </div>
      <div class="col-md-8 text-right">
        <a href="{{ route('categorias.create') }}" class="btn btn-success">Nueva</a>
        <a href="{{ route('organicos.index') }}" class="btn btn-info">Ir a Orgánicos</a>
      </div>
    </div>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($categorias as $categoria)
          <tr>
            <td>{{ $categoria->id }}</td>
            <td>{{ $categoria->nombre }}</td>
            <td>{{ $categoria->descripcion }}</td>
            <td>
              <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-primary btn-sm">Editar</a>
              <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Deseas eliminar esta categoría?')">Eliminar</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="4" class="text-center">Sin registros</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
