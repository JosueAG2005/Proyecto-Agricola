@extends('layouts.adminlte')

@section('title', 'Listado de Animales')
@section('page_title', 'Listado de Animales')

@section('content')
<style>
  .animals-header {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    color: white;
    padding: 2rem;
    border-radius: 15px 15px 0 0;
    margin-bottom: 0;
  }
  
  .animal-card {
    border: 1px solid #e9ecef;
    border-radius: 12px;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
    transition: all 0.3s ease;
    background: white;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
  }
  
  .animal-card:hover {
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transform: translateY(-2px);
  }
  
  .animal-image {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 10px;
    border: 2px solid #e9ecef;
    cursor: pointer;
    transition: transform 0.3s ease;
  }
  
  .animal-image:hover {
    transform: scale(1.05);
  }
  
  .animal-info h5 {
    font-size: 1.3rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.5rem;
  }
  
  .info-badge {
    padding: 0.4rem 0.8rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 500;
    margin-right: 0.5rem;
    margin-bottom: 0.5rem;
    display: inline-block;
  }
  
  .price-tag {
    font-size: 1.5rem;
    font-weight: 700;
    color: #28a745;
  }
  
  .stock-badge {
    font-size: 1rem;
    padding: 0.5rem 1rem;
    border-radius: 20px;
  }
  
  .action-buttons {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
  }
  
  .btn-action {
    min-width: 40px;
    height: 40px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
  }
  
  .btn-action:hover {
    transform: scale(1.1);
  }
  
  .empty-state {
    text-align: center;
    padding: 4rem 2rem;
  }
  
  .empty-state i {
    font-size: 5rem;
    color: #dee2e6;
    margin-bottom: 1.5rem;
  }
  
  .info-row {
    display: flex;
    align-items: center;
    margin-bottom: 0.5rem;
  }
  
  .info-row i {
    width: 20px;
    color: #6c757d;
    margin-right: 0.5rem;
  }
  
  @media (max-width: 768px) {
    .animal-image {
      width: 100px;
      height: 100px;
    }
    
    .animal-card {
      padding: 1rem;
    }
  }
</style>

<div class="container-fluid">
  <div class="card shadow-sm border-0" style="border-radius: 15px; overflow: hidden;">
    <div class="animals-header">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h3 class="mb-1" style="font-weight: 700;">
            <i class="fas fa-cow mr-2"></i>Listado de Animales
          </h3>
          <p class="mb-0 text-white-50">
            <i class="fas fa-list mr-1"></i>{{ $ganados->total() ?? $ganados->count() }} 
            {{ ($ganados->total() ?? $ganados->count()) == 1 ? 'animal registrado' : 'animales registrados' }}
          </p>
        </div>
        @if(auth()->check() && (auth()->user()->isVendedor() || auth()->user()->isAdmin()))
          <a href="{{ route('ganados.create') }}" class="btn btn-light btn-lg">
            <i class="fas fa-plus-circle mr-2"></i>Nuevo Registro
          </a>
        @endif
      </div>
    </div>

    <div class="card-body p-4">
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif

      @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif

      @if($ganados->count() > 0)
        @foreach($ganados as $ganado)
          <div class="animal-card">
            <div class="row">
              <div class="col-md-2 col-4 mb-3 mb-md-0">
                @if($ganado->imagen)
                  <img src="{{ asset('storage/'.$ganado->imagen) }}" 
                       alt="{{ $ganado->nombre }}" 
                       class="animal-image"
                       onclick="window.open('{{ asset('storage/'.$ganado->imagen) }}', '_blank')"
                       title="Click para ver imagen completa">
                @else
                  <div class="bg-light d-flex align-items-center justify-content-center animal-image">
                    <i class="fas fa-image fa-3x text-muted"></i>
                  </div>
                @endif
              </div>
              
              <div class="col-md-6 col-8">
                <div class="animal-info">
                  <h5>
                    <i class="fas fa-tag text-primary mr-2"></i>{{ $ganado->nombre }}
                    <span class="badge badge-secondary ml-2">#{{ $ganado->id }}</span>
                  </h5>
                  
                  <div class="mb-2">
                    @if($ganado->tipoAnimal)
                      <span class="info-badge badge-info">
                        <i class="fas fa-paw mr-1"></i>{{ $ganado->tipoAnimal->nombre }}
                      </span>
                    @endif
                    
                    @if($ganado->raza)
                      <span class="info-badge badge-secondary">
                        <i class="fas fa-dna mr-1"></i>{{ $ganado->raza->nombre }}
                      </span>
                    @endif
                    
                    @if($ganado->categoria)
                      <span class="info-badge badge-success">
                        <i class="fas fa-tags mr-1"></i>{{ $ganado->categoria->nombre }}
                      </span>
                    @endif
                  </div>
                  
                  <div class="info-row">
                    <i class="fas fa-birthday-cake"></i>
                    <span><strong>Edad:</strong> {{ $ganado->edad ?? 'N/A' }} meses</span>
                  </div>
                  
                  <div class="info-row">
                    <i class="fas fa-venus-mars"></i>
                    <span><strong>Sexo:</strong> {{ $ganado->sexo ?? 'N/A' }}</span>
                  </div>
                  
                  @if($ganado->tipoPeso)
                    <div class="info-row">
                      <i class="fas fa-weight-hanging"></i>
                      <span><strong>Peso:</strong> {{ $ganado->tipoPeso->nombre }}</span>
                    </div>
                  @endif
                  
                  <div class="info-row">
                    <i class="fas fa-map-marker-alt"></i>
                    <span class="text-muted">
                      {{ Str::limit($ganado->ubicacion ?? 'Sin ubicación', 50) }}
                    </span>
                  </div>
                  
                  @if($ganado->fecha_publicacion)
                    <div class="info-row">
                      <i class="fas fa-calendar-check"></i>
                      <span class="text-success">
                        <strong>Publicado:</strong> {{ \Carbon\Carbon::parse($ganado->fecha_publicacion)->format('d/m/Y') }}
                      </span>
                    </div>
                  @else
                    <div class="info-row">
                      <i class="fas fa-calendar-times"></i>
                      <span class="text-warning">
                        <strong>No publicado</strong>
                      </span>
                    </div>
                  @endif
                  
                  @if($ganado->datoSanitario)
                    <div class="info-row">
                      <i class="fas fa-syringe"></i>
                      <span class="text-info">
                        <strong>Datos sanitarios:</strong> {{ Str::limit($ganado->datoSanitario->vacuna ?? 'Registrado', 30) }}
                      </span>
                    </div>
                  @else
                    <div class="info-row">
                      <i class="fas fa-syringe"></i>
                      <span class="text-muted">Sin registro sanitario</span>
                    </div>
                  @endif
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="d-flex flex-column h-100 justify-content-between">
                  <div>
                    @if($ganado->precio)
                      <div class="mb-3">
                        <label class="text-muted small mb-1 d-block">Precio</label>
                        <div class="price-tag">Bs {{ number_format($ganado->precio, 2) }}</div>
                      </div>
                    @endif
                    
                    <div class="mb-3">
                      <label class="text-muted small mb-1 d-block">Stock Disponible</label>
                      <span class="stock-badge badge {{ ($ganado->stock ?? 0) > 0 ? 'badge-success' : 'badge-danger' }}">
                        <i class="fas fa-boxes mr-1"></i>{{ $ganado->stock ?? 0 }} unidades
                      </span>
                    </div>
                  </div>
                  
                  <div class="action-buttons mt-auto">
                    <a href="{{ route('ganados.show', $ganado->id) }}" 
                       class="btn btn-info btn-action" 
                       title="Ver detalles">
                      <i class="fas fa-eye"></i>
                    </a>
                    
                    @if(auth()->check() && (auth()->user()->isVendedor() || auth()->user()->isAdmin()))
                      @if(auth()->user()->isAdmin() || $ganado->user_id == auth()->id())
                        <a href="{{ route('ganados.edit', $ganado->id) }}"
                           class="btn btn-warning btn-action"
                           title="Editar">
                          <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ route('ganados.destroy', $ganado->id) }}"
                              method="POST" 
                              class="d-inline"
                              id="deleteForm{{ $ganado->id }}">
                          @csrf
                          @method('DELETE')
                          <button type="button" 
                                  class="btn btn-danger btn-action"
                                  onclick="confirmDelete({{ $ganado->id }})"
                                  title="Eliminar">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
                      @endif
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        
        <div class="mt-4">
          {{ $ganados->links() }}
        </div>
      @else
        <div class="empty-state">
          <i class="fas fa-cow"></i>
          <h3 class="text-muted mb-3">No hay animales registrados</h3>
          <p class="text-muted mb-4">Comienza agregando tu primer animal al sistema</p>
          @if(auth()->check() && (auth()->user()->isVendedor() || auth()->user()->isAdmin()))
            <a href="{{ route('ganados.create') }}" class="btn btn-success btn-lg">
              <i class="fas fa-plus-circle mr-2"></i>Agregar Primer Animal
            </a>
          @endif
        </div>
      @endif
    </div>
  </div>
</div>

<script>
function confirmDelete(ganadoId) {
  if (confirm('¿Estás seguro de eliminar este animal? Esta acción no se puede deshacer.')) {
    document.getElementById('deleteForm' + ganadoId).submit();
  }
}
</script>
@endsection
