<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Mercado Agrícola')</title>

  <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed theme-agro">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/') }}" class="nav-link">Inicio</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ url('/') }}" class="brand-link">
      <span class="brand-text font-weight-light">Mercado Agrícola</span>
    </a>

    <div class="sidebar">
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column">

          <!-- ORGÁNICOS -->
          <li class="nav-item">
            <a href="{{ route('organicos.index') }}"
               class="nav-link {{ request()->routeIs('organicos.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-leaf"></i>
              <p>Orgánicos</p>
            </a>
          </li>

          <!-- MAQUINARIA -->
          <li class="nav-item">
            <a href="{{ route('maquinarias.index') }}"
               class="nav-link {{ request()->routeIs('maquinarias.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tractor"></i>
              <p>Maquinaria</p>
            </a>
          </li>

          <!-- TIPOS DE ANIMAL -->
          <li class="nav-item">
            <a href="{{ route('tipo_animals.index') }}"
               class="nav-link {{ request()->routeIs('tipo_animals.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-paw"></i>
              <p>Tipos de Animal</p>
            </a>
          </li>

          <!-- CATEGORÍAS -->
          <li class="nav-item">
            <a href="{{ route('categorias.index') }}"
               class="nav-link {{ request()->routeIs('categorias.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tags"></i>
              <p>Categorías</p>
            </a>
          </li>

          <!-- TIPO DE PESO -->
          <li class="nav-item">
            <a href="{{ route('tipo-pesos.index') }}"
               class="nav-link {{ request()->routeIs('tipo-pesos.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-weight-hanging"></i>
              <p>Tipo de Peso</p>
            </a>
          </li>

          <!-- GANADO -->
          <li class="nav-item">
            <a href="{{ route('ganados.index') }}"
               class="nav-link {{ request()->routeIs('ganados.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-cow"></i>
              <p>Animales</p>
            </a>
          </li>
<li class="nav-item">
    <a href="{{ route('datos-sanitarios.index') }}"
       class="nav-link {{ request()->routeIs('datos-sanitarios.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-syringe"></i>
        <p>Datos Sanitarios</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('razas.index') }}" 
       class="nav-link {{ request()->routeIs('razas.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-dna"></i>
        <p>Razas</p>
    </a>
</li>

        </ul>

      </nav>
    </div>

  </aside>
  <!-- /.sidebar -->

  <!-- Content -->
  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <h1>@yield('page_title','Panel')</h1>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div>
    </section>

  </div>

  <!-- Footer -->
  <footer class="main-footer text-sm text-center">
    © {{ date('Y') }} Mercado Agrícola
  </footer>

</div>

<script src="{{ asset('vendor/adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>

</body>
</html>
