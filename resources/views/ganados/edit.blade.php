@extends('layouts.adminlte')

@section('title', 'Editar Ganado')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Editar Registro de Ganado</h1>
        <a href="{{ route('ganados.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('ganados.update', $ganado->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="nombre">Nombre *</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" 
                           value="{{ old('nombre', $ganado->nombre) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="tipo">Tipo *</label>
                    <select name="tipo" id="tipo" class="form-control" required>
                        <option value="Vaca" {{ $ganado->tipo == 'Vaca' ? 'selected' : '' }}>Vaca</option>
                        <option value="Toro" {{ $ganado->tipo == 'Toro' ? 'selected' : '' }}>Toro</option>
                        <option value="Ternero" {{ $ganado->tipo == 'Ternero' ? 'selected' : '' }}>Ternero</option>
                        <option value="Novillo" {{ $ganado->tipo == 'Novillo' ? 'selected' : '' }}>Novillo</option>
                        <option value="Becerra" {{ $ganado->tipo == 'Becerra' ? 'selected' : '' }}>Becerra</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="edad">Edad (meses)</label>
                    <input type="number" name="edad" id="edad" class="form-control"
                           value="{{ old('edad', $ganado->edad) }}" min="0">
                </div>

                <div class="form-group mb-3">
                    <label for="peso">Peso (kg)</label>
                    <input type="number" name="peso" id="peso" class="form-control"
                           value="{{ old('peso', $ganado->peso) }}" step="0.01" min="0">
                </div>

                <div class="form-group mb-3">
                    <label for="sexo">Sexo</label>
                    <select name="sexo" id="sexo" class="form-control">
                        <option value="">Seleccione</option>
                        <option value="Macho" {{ $ganado->sexo == 'Macho' ? 'selected' : '' }}>Macho</option>
                        <option value="Hembra" {{ $ganado->sexo == 'Hembra' ? 'selected' : '' }}>Hembra</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="categoria_id">Categoría *</label>
                    <select name="categoria_id" id="categoria_id" class="form-control" required>
                        <option value="">Seleccione una categoría</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}"
                                {{ $ganado->categoria_id == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" rows="3">{{ old('descripcion', $ganado->descripcion) }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="precio">Precio (Bs)</label>
                    <input type="number" name="precio" id="precio" class="form-control"
                           value="{{ old('precio', $ganado->precio) }}" step="0.01" min="0">
                </div>

                <div class="form-group mb-3">
                    <label for="imagen">Imagen</label><br>
                    @if($ganado->imagen)
                        <img src="{{ asset('storage/'.$ganado->imagen) }}" alt="imagen actual" width="100" class="mb-2">
                    @endif
                    <input type="file" name="imagen" id="imagen" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Actualizar Registro
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
