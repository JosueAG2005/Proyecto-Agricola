<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $__env->yieldContent('title','AgroVida'); ?></title>

  <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/plugins/fontawesome-free/css/all.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('vendor/adminlte/dist/css/adminlte.min.css')); ?>">

  <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">
</head>

<body class="hold-transition layout-top-nav <?php echo e(request()->routeIs('login.demo','register.demo') ? 'no-topbar' : ''); ?>">
<div class="wrapper">

  <?php if(!request()->routeIs('login.demo','register.demo')): ?>
  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-0 project-topbar">
    <div class="container">
      <a href="<?php echo e(route('home')); ?>" class="navbar-brand d-flex align-items-center">
        <img src="<?php echo e(asset('img/logo-agrovida.png')); ?>" alt="AgroVida" style="height:34px">
        <span class="brand-text font-weight-bold ml-2 text-white">AgroVida Bolivia</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topnav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div id="topnav" class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link text-white <?php echo e(request()->routeIs('home')?'active':''); ?>" href="<?php echo e(route('home')); ?>">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="<?php echo e(route('ads.index')); ?>">Anuncios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-success text-white px-3 ml-lg-2" href="<?php echo e(route('ads.create')); ?>">
              Publicita tu Anuncio <i class="fas fa-plus ml-1"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php endif; ?>


  <div class="content-wrapper bg-white">
    <?php echo $__env->yieldContent('content'); ?>
  </div>

  <footer class="main-footer text-sm">
    <div class="container">
      <strong>© <?php echo e(date('Y')); ?> AgroVida.</strong> Tu mercado agrícola.
      <span class="float-right d-none d-sm-inline">Hecho con AdminLTE 3</span>
    </div>
  </footer>
</div>

<script src="<?php echo e(asset('vendor/adminlte/plugins/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/adminlte/dist/js/adminlte.min.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\dev\Proyecto-Mercado-Agricola-main\Proyecto-Mercado-Agricola-main\resources\views/layouts/public.blade.php ENDPATH**/ ?>