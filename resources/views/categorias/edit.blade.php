@extends('layouts.gentelella')

@section('content')
<div class="x_panel">
    <div class="x_title">
        <h2>Editar Categoría</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <form action="{{ route('categorias.update', $categoria) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ $categoria->nombre }}" required>
            </div>
            <div class="form-group">
                <label>Descripción</label>
                <textarea name="descripcion" class="form-control">{{ $categoria->descripcion }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
            <select name="categoria_id" id="categoria_id" class="form-control" required>
    <option value="">Seleccione una categoría</option>
    @foreach($categorias as $categoria)
        <option value="{{ $categoria->id }}" {{ $organico->categoria_id == $categoria->id ? 'selected' : '' }}>
            {{ $categoria->nombre }}
        </option>
    @endforeach
</select>

        </form>
    </div>
</div>
@endsection
