@extends('layouts.adminlte')

@section('title', 'Registrar Ganado')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Registrar Nuevo Ganado</h1>
        <a href="{{ route('ganados.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('ganados.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="nombre">Nombre *</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="tipo">Tipo *</label>
                    <select name="tipo" id="tipo" class="form-control" required>
                        <option value="">Seleccione tipo</option>
                        <option value="Vaca">Vaca</option>
                        <option value="Toro">Toro</option>
                        <option value="Ternero">Ternero</option>
                        <option value="Novillo">Novillo</option>
                        <option value="Becerra">Becerra</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="edad">Edad (meses)</label>
                    <input type="number" name="edad" id="edad" class="form-control" min="0" value="{{ old('edad') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="peso">Peso (kg)</label>
                    <input type="number" name="peso" id="peso" class="form-control" min="0" step="0.01" value="{{ old('peso') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="sexo">Sexo</label>
                    <select name="sexo" id="sexo" class="form-control">
                        <option value="">Seleccione</option>
                        <option value="Macho">Macho</option>
                        <option value="Hembra">Hembra</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="categoria_id">Categoría *</label>
                    <select name="categoria_id" id="categoria_id" class="form-control" required>
                        <option value="">Seleccione una categoría</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" rows="3">{{ old('descripcion') }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="precio">Precio (Bs)</label>
                    <input type="number" name="precio" id="precio" class="form-control" step="0.01" min="0" value="{{ old('precio') }}">
                </div>

                <div class="form-group mb-3">
                    <label for="imagen">Imagen</label>
                    <input type="file" name="imagen" id="imagen" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Guardar Registro
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
