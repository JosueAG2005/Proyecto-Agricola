<?php $__env->startSection('title','Crear cuenta'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <div class="card shadow-sm rounded-lg">
        <div class="card-body p-4 p-md-5">
          <div class="text-center mb-3">
            <img src="<?php echo e(asset('img/logo-agrovida.png')); ?>" alt="AgroVida" style="height:64px">
          </div>
          <h5 class="text-center mb-1">Crear cuenta</h5>
          <p class="text-center text-muted mb-4">Completa tus datos para comenzar</p>

          <form onsubmit="return false;">
            <div class="form-group">
              <label class="mb-1">Nombre</label>
              <input type="text" class="form-control form-control-lg login-input" placeholder="Escribir Nombre">
            </div>

            <div class="form-group">
              <label class="mb-1">Correo</label>
              <input type="email" class="form-control form-control-lg login-input" placeholder="Correo Electrónico">
            </div>

            <div class="form-group">
              <label class="mb-1">Contraseña</label>
              <input type="password" class="form-control form-control-lg login-input" placeholder="Contraseña">
              <small class="form-text text-muted">8+ caracteres.</small>
            </div>

            <div class="form-group">
              <label class="mb-1">Confirmar</label>
              <input type="password" class="form-control form-control-lg login-input" placeholder="Confirmar Contraseña">
            </div>

            <a href="<?php echo e(route('login.demo')); ?>" class="btn btn-success btn-lg btn-block">Crear Cuenta</a>

            <p class="text-center mt-3 mb-0">
              ¿Ya tienes cuenta?
              <a href="<?php echo e(route('login.demo')); ?>" class="font-weight-bold">Inicia sesión</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\dev\Proyecto-Mercado-Agricola-main\Proyecto-Mercado-Agricola-main\resources\views/public/auth/register.blade.php ENDPATH**/ ?>