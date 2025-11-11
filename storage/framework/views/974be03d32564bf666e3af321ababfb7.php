<?php $__env->startSection('title','Iniciar sesión'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-lg-7 mb-4 mb-lg-0">
      <div class="login-hero rounded-lg">
        <div class="p-4 p-md-5 text-white">
          <img src="<?php echo e(asset('img/logo-agrovida.png')); ?>" alt="AgroVida" class="mb-3" style="height:52px">
          <h2 class="font-weight-bold mb-2">AgroVida Bolivia</h2>
          <p class="text-white-50 mb-3">
            Mercado y servicios para el agro. Encuentra animales, orgánicos, maquinaria y más — todo en un solo lugar.
          </p>

          <div class="d-flex align-items-center">
            <img class="rounded-circle mr-2 shadow-sm" src="https://picsum.photos/seed/a/48/48" alt="">
            <img class="rounded-circle mr-2 shadow-sm" src="https://picsum.photos/seed/b/48/48" alt="">
            <img class="rounded-circle mr-2 shadow-sm" src="https://picsum.photos/seed/c/48/48" alt="">
            <span class="badge badge-light text-muted ml-2 px-3 py-2">Maquinaria</span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-5">
      <div class="card shadow-sm rounded-lg login-card">
        <div class="card-body p-4 p-md-5">
          <div class="text-center mb-3">
            <img src="<?php echo e(asset('img/logo-agrovida.png')); ?>" alt="AgroVida" style="height:64px">
          </div>
          <h5 class="text-center mb-1">Iniciar sesión</h5>
          <p class="text-center text-muted mb-4">
            Accede con tu cuenta para continuar. Según tu rol, te llevaremos a tu panel.
          </p>

          <form onsubmit="return false;">
            <div class="form-group">
              <label class="mb-1">Correo</label>
              <input type="email" class="form-control form-control-lg login-input" placeholder="Correo Electrónico">
            </div>
            <div class="form-group">
              <label class="mb-1">Contraseña</label>
              <input type="password" class="form-control form-control-lg login-input" placeholder="Contraseña">
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="remember">
                <label class="custom-control-label" for="remember">Recuérdame</label>
              </div>
              <a href="#" class="small">¿Olvidaste tu contraseña?</a>
            </div>

            <a href="<?php echo e(route('home')); ?>" class="btn btn-success btn-lg btn-block">
            Entrar
            </a>


            <p class="text-center mt-3 mb-0">
            ¿No tienes cuenta? <a href="<?php echo e(route('register.demo')); ?>" class="font-weight-bold">Crear cuenta</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\dev\Proyecto-Mercado-Agricola-main\Proyecto-Mercado-Agricola-main\resources\views/public/auth/login.blade.php ENDPATH**/ ?>