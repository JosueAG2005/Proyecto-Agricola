<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $__env->yieldContent('title','Mercado Agrícola'); ?></title>

  <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/plugins/fontawesome-free/css/all.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/dist/css/adminlte.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">
</head>
<body class="hold-transition sidebar-mini layout-fixed theme-agro">
<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a></li>
      <li class="nav-item d-none d-sm-inline-block"><a href="<?php echo e(url('/')); ?>" class="nav-link">Inicio</a></li>
    </ul>
  </nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="<?php echo e(url('/')); ?>" class="brand-link">
    <span class="brand-text font-weight-light">Mercado Agrícola</span>
  </a>
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column">
        <li class="nav-item">
          <a href="<?php echo e(route('organicos.index')); ?>"
             class="nav-link <?php echo e(request()->routeIs('organicos.*') ? 'active' : ''); ?>">
            <i class="nav-icon fas fa-leaf"></i><p>Orgánicos</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo e(route('maquinarias.index')); ?>"
             class="nav-link <?php echo e(request()->routeIs('maquinarias.*') ? 'active' : ''); ?>">
            <i class="nav-icon fas fa-tractor"></i><p>Maquinaria</p>
          </a>
        </li>
       <li class="nav-item">
          <a href="<?php echo e(route('categorias.index')); ?>"
             class="nav-link <?php echo e(request()->routeIs('categorias.*') ? 'active' : ''); ?>">
            <i class="nav-icon fas fa-tags"></i><p>Categorías</p>

          </a>
        </li>
        <li class="nav-item">
  <a href="<?php echo e(route('ganados.index')); ?>"
     class="nav-link <?php echo e(request()->routeIs('ganados.*') ? 'active' : ''); ?>">
    <i class="nav-icon fas fa-cow"></i>
    <p>Ganado</p>
  </a>
</li>

      </ul>
    </nav>
  </div>
</aside>


  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <h1><?php echo $__env->yieldContent('page_title','Panel'); ?></h1>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <?php echo $__env->yieldContent('content'); ?>
      </div>
    </section>
  </div>

  <footer class="main-footer text-sm text-center">© <?php echo e(date('Y')); ?> Mercado Agrícola</footer>
</div>

<script src="<?php echo e(asset('vendor/adminlte/plugins/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/adminlte/dist/js/adminlte.min.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\dev\Proyecto-Mercado-Agricola-main\Proyecto-Mercado-Agricola-main\resources\views/layouts/adminlte.blade.php ENDPATH**/ ?>