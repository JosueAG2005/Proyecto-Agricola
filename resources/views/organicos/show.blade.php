@extends('layouts.adminlte')

@section('title', 'Detalle de Producto Orgánico')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1 text-dark">
                <i class="fas fa-leaf text-success"></i> Detalle de Producto Orgánico
            </h1>
            <p class="text-muted mb-0">Información completa del producto</p>
        </div>
        <a href="{{ url()->previous() !== url()->current() ? url()->previous() : route('organicos.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </div>

    <div class="row">
        <!-- Galería de Imágenes -->
        <div class="col-lg-5 mb-4">
            @if($organico->imagenes && $organico->imagenes->count() > 0)
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body p-0">
                        <div class="position-relative" style="overflow: hidden; border-radius: 8px 8px 0 0;">
                            <img id="mainImage" 
                                 src="{{ asset('storage/'.$organico->imagenes->first()->ruta) }}" 
                                 alt="{{ $organico->nombre }}" 
                                 class="img-fluid w-100" 
                                 style="height: 450px; object-fit: cover; cursor: pointer;"
                                 onclick="window.open(this.src, '_blank')"
                                 title="Click para ver imagen completa">
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge badge-success badge-lg">
                                    <i class="fas fa-image"></i> Click para ampliar
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                @if($organico->imagenes->count() > 1)
                    <div class="row">
                        @foreach($organico->imagenes as $imagen)
                            <div class="col-4 mb-2">
                                <img src="{{ asset('storage/'.$imagen->ruta) }}" 
                                     alt="Imagen {{ $loop->iteration }}" 
                                     class="img-thumbnail w-100" 
                                     style="height: 100px; object-fit: cover; cursor: pointer;"
                                     onclick="document.getElementById('mainImage').src = this.src"
                                     onmouseover="this.style.opacity='0.7'" 
                                     onmouseout="this.style.opacity='1'"
                                     title="Click para ver">
                            </div>
                        @endforeach
                    </div>
                @endif
            @else
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-center bg-light" style="height: 450px;">
                            <div class="text-center text-muted">
                                <i class="fas fa-image fa-4x mb-3"></i>
                                <p class="mb-0">Sin imágenes disponibles</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Información Principal -->
        <div class="col-lg-7">
            <!-- Título y Precio -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h2 class="h4 mb-3 text-dark">{{ $organico->nombre }}</h2>
                    
                    <div class="d-flex flex-wrap align-items-center gap-3 mb-3">
                        <span class="badge badge-success badge-lg px-3 py-2">
                            <i class="fas fa-tag"></i> {{ $organico->categoria->nombre ?? 'Sin categoría' }}
                        </span>
                        @if($organico->unidad)
                            <span class="badge badge-info badge-lg px-3 py-2">
                                <i class="fas fa-balance-scale"></i> {{ $organico->unidad->nombre }}
                            </span>
                        @endif
                        @if($organico->stock ?? 0 > 0)
                            <span class="badge badge-primary badge-lg px-3 py-2">
                                <i class="fas fa-box"></i> Stock: {{ $organico->stock }}
                            </span>
                        @endif
                    </div>

                    @if($organico->precio)
                        <div class="bg-success-light p-4 rounded mb-3" style="background-color: #d4edda;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <small class="text-muted d-block mb-1">Precio</small>
                                    <h3 class="h4 mb-0 text-success font-weight-bold">
                                        Bs {{ number_format($organico->precio, 2) }}
                                        @if($organico->unidad)
                                            <small class="text-muted">/ {{ $organico->unidad->nombre }}</small>
                                        @endif
                                    </h3>
                                </div>
                                <div class="text-right">
                                    <i class="fas fa-leaf fa-3x text-success opacity-50"></i>
                                </div>
                            </div>
                        </div>
                    @endif

                    @auth
                        @if($organico->precio && ($organico->stock ?? 0) > 0)
                            <div class="border-top pt-4">
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_type" value="organico">
                                    <input type="hidden" name="product_id" value="{{ $organico->id }}">
                                    <div class="form-row align-items-end">
                                        <div class="col-auto">
                                            <label class="small font-weight-bold text-muted mb-2 d-block">Cantidad</label>
                                            <input type="number" 
                                                   name="cantidad" 
                                                   class="form-control form-control-lg" 
                                                   value="1" 
                                                   min="1" 
                                                   max="{{ $organico->stock ?? 1 }}" 
                                                   required
                                                   style="width: 120px;">
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="btn btn-success btn-lg btn-block shadow-sm">
                                                <i class="fas fa-cart-plus"></i> Agregar al Carrito
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Información Detallada -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">
                        <i class="fas fa-info-circle text-primary"></i> Información Detallada
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if($organico->fecha_cosecha)
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-start">
                                    <div class="mr-3">
                                        <i class="fas fa-calendar-alt fa-2x text-success opacity-50"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block mb-1">Fecha de Cosecha</small>
                                        <strong class="d-block">{{ \Carbon\Carbon::parse($organico->fecha_cosecha)->format('d/m/Y') }}</strong>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($organico->origen)
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-start">
                                    <div class="mr-3">
                                        <i class="fas fa-map-marker-alt fa-2x text-danger opacity-50"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block mb-1">Origen / Procedencia</small>
                                        <strong class="d-block">{{ $organico->origen }}</strong>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    @if($organico->descripcion)
                        <div class="mt-4 pt-3 border-top">
                            <h6 class="text-muted mb-2">
                                <i class="fas fa-align-left"></i> Descripción
                            </h6>
                            <p class="mb-0 text-dark">{{ $organico->descripcion }}</p>
                        </div>
                    @endif
                </div>
            </div>

            @if($organico->latitud_origen && $organico->longitud_origen)
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white border-bottom">
                        <h5 class="mb-0">
                            <i class="fas fa-seedling text-success"></i> Origen / Procedencia
                        </h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-3">
                            <i class="fas fa-location-dot text-danger"></i> 
                            <strong>{{ $organico->origen ?? 'Lugar de cosecha' }}</strong>
                        </p>
                        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#mapModal">
                            <i class="fas fa-map"></i> Ver Mapa del Origen
                        </button>
                    </div>
                </div>
            @endif
        </div>

        <div class="col-lg-4">
            @if($organico->origen)
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white border-bottom">
                        <h5 class="mb-0">
                            <i class="fas fa-seedling text-success"></i> Origen
                        </h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">
                            <i class="fas fa-location-dot text-danger"></i> 
                            <strong>{{ $organico->origen }}</strong>
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal del Mapa -->
@if($organico->latitud_origen && $organico->longitud_origen)
<div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mapModalLabel">
                    <i class="fas fa-seedling text-success"></i> Origen / Procedencia del Producto
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <div id="map-origen" style="height: 500px; width: 100%;"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    var mapOrigen = null;
    
    // Inicializar el mapa cuando se abra el modal
    $('#mapModal').on('shown.bs.modal', function () {
        if (!mapOrigen) {
            mapOrigen = L.map('map-origen').setView([{{ $organico->latitud_origen }}, {{ $organico->longitud_origen }}], 12);

            // Capa gratuita de OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'OpenStreetMap'
            }).addTo(mapOrigen);

            // Agregar marcador en el origen
            var markerOrigen = L.marker([{{ $organico->latitud_origen }}, {{ $organico->longitud_origen }}]).addTo(mapOrigen);
            
            // Agregar popup con información
            markerOrigen.bindPopup('<b>{{ $organico->nombre }}</b><br>Origen: {{ $organico->origen ?? "Lugar de cosecha" }}').openPopup();
        } else {
            mapOrigen.invalidateSize();
        }
    });
</script>
@endif

<style>
.badge-lg {
    font-size: 0.9rem;
    padding: 0.5rem 0.75rem;
}
.bg-success-light {
    background-color: #d4edda !important;
}
</style>
@endsection
