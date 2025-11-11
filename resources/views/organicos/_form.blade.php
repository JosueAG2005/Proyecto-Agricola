@csrf
<div class="form-group">
  <label>Nombre *</label>
  <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $organico->nombre ?? '') }}" required>
</div>
<div class="form-group">
    <label for="categoria_id">Categoría *</label>
    <select name="categoria_id" id="categoria_id" class="form-control" required>
        <option value="">Seleccione una categoría</option>
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}"
                {{ old('categoria_id', $organico->categoria_id ?? '') == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nombre }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
  <label>Precio *</label>
  <input type="number" step="0.01" name="precio" class="form-control" value="{{ old('precio', $organico->precio ?? 0) }}" required>
</div>
<div class="form-group">
  <label>Stock *</label>
  <input type="number" name="stock" class="form-control" value="{{ old('stock', $organico->stock ?? 0) }}" required>
</div>
<div class="form-group">
  <label>Fecha de cosecha</label>
  <input type="date" name="fecha_cosecha" class="form-control" value="{{ old('fecha_cosecha', $organico->fecha_cosecha ?? '') }}">
</div>
<div class="form-group">
  <label>Descripción</label>
  <textarea name="descripcion" class="form-control" rows="3">{{ old('descripcion', $organico->descripcion ?? '') }}</textarea>
</div>
<button class="btn btn-success">Guardar</button>
<a href="{{ route('organicos.index') }}" class="btn btn-secondary">Volver</a>
