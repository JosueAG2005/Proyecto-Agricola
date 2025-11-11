@extends('layouts.adminlte')
@section('title','Maquinarias')
@section('page_title','Maquinarias')

@section('content')
<div class="card">
  <div class="card-header">
    <div class="d-flex align-items-center">
      <h3 class="card-title mb-0 mr-auto">Listado</h3>

      <form method="get" class="form-inline">
        <div class="input-group input-group-sm mr-2">
          <input type="text" name="q" value="{{ $q ?? '' }}" class="form-control" placeholder="Buscar...">
          <div class="input-group-append">
            <button class="btn btn-primary">Buscar</button>
          </div>
        </div>
      </form>

      <a href="{{ route('maquinarias.create') }}" class="btn btn-success btn-sm mr-2">Nueva</a>
      <a href="{{ route('organicos.index') }}" class="btn btn-info btn-sm">Ir a Orgánicos</a>
    </div>
  </div>

  <div class="card-body p-0">
    @if(session('ok'))
      <div class="alert alert-success m-3">{{ session('ok') }}</div>
    @endif

    <div class="table-responsive">
      <table class="table table-hover mb-0">
        <thead class="thead-light">
          <tr>
            <th>#</th><th>Nombre</th><th>Tipo</th><th>Marca</th><th>Precio/día</th><th>Estado</th><th class="text-right pr-3">Acciones</th>
          </tr>
        </thead>
        <tbody>
        @forelse($maquinarias as $m)
          <tr>
            <td>{{ $m->id }}</td>
            <td><a href="{{ route('maquinarias.show',$m) }}">{{ $m->nombre }}</a></td>
            <td>{{ $m->tipo }}</td>
            <td>{{ $m->marca }}</td>
            <td>{{ number_format($m->precio_dia,2) }}</td>
            <td>
              @php
                $map = ['disponible'=>'success','en_mantenimiento'=>'secondary','vendido'=>'danger'];
              @endphp
              <span class="badge badge-{{ $map[$m->estado] ?? 'light' }}">{{ str_replace('_',' ',$m->estado) }}</span>
            </td>
            <td class="text-right pr-3">
              <a href="{{ route('maquinarias.edit',$m) }}" class="btn btn-sm btn-primary">Editar</a>
              <form action="{{ route('maquinarias.destroy',$m) }}" method="post" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="7" class="text-center text-muted">Sin registros</td></tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <div class="card-footer">
    {{ $maquinarias->appends(['q'=>$q ?? null])->links() }}
  </div>
</div>
@endsection
