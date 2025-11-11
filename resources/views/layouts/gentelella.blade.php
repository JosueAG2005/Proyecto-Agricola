<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>@yield('title','Mercado Agrícola')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('gentelella/vendors/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('gentelella/vendors/nprogress/nprogress.css') }}">
  <link rel="stylesheet" href="{{ asset('gentelella/build/css/custom.min.css') }}">
</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border:0;">
            <a href="{{ url('/') }}" class="site_title"><i class="fa fa-leaf"></i> <span>Mercado Agrícola</span></a>
          </div>
          <br/>
       <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>Menú</h3>
    <ul class="nav side-menu">
      <li><a><i class="fa fa-leaf"></i> Módulos <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('organicos.index', [], false) }}"><i class="fa fa-pagelines"></i> Orgánicos</a></li>
          <li><a href="{{ route('maquinarias.index', [], false) }}"><i class="fa fa-tractor"></i> Maquinaria</a></li>
          <li><a href="{{ route('categorias.index', [], false) }}"><i class="fa fa-tags"></i> Categorías</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>

        </div>
      </div>

      <div class="top_nav"><div class="nav_menu"><nav>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="{{ url('/') }}">Inicio</a></li>
        </ul>
      </nav></div></div>

      <div class="right_col" role="main">
        @yield('content')
      </div>

      <footer><div class="pull-right">Laravel + PostgreSQL + Gentelella</div><div class="clearfix"></div></footer>
    </div>
  </div>

  <script src="{{ asset('gentelella/vendors/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('gentelella/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('gentelella/vendors/fastclick/lib/fastclick.js') }}"></script>
  <script src="{{ asset('gentelella/vendors/nprogress/nprogress.js') }}"></script>
  <script src="{{ asset('gentelella/build/js/custom.min.js') }}"></script>
</body>
</html>
