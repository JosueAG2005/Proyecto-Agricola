<?php $__env->startSection('title','Inicio'); ?>

<?php $__env->startSection('content'); ?>
<section class="hero" style="background:url('<?php echo e(asset('img/bg-agrovida.jpg')); ?>') center/cover no-repeat; min-height:350px;">
  <div class="container py-5 text-white">
    <h5 class="mb-2">Bienvenido a Agrovida</h5>
    <h1 class="display-5 font-weight-bold">
      Tu mercado de animales, maquinaria y<br>orgánicos en un solo lugar
    </h1>

    <div class="bg-white p-3 rounded mt-4 shadow-sm">
      <form class="form-row align-items-center">
        <div class="col-md-3 mb-2">
          <select class="form-control">
            <option>Seleccione la categoría</option>
            <option>Animales</option>
            <option>Maquinaria</option>
            <option>Orgánico</option>
          </select>
        </div>
        <div class="col-md-7 mb-2">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input class="form-control" placeholder="Search">
          </div>
        </div>
        <div class="col-md-2 mb-2">
          <button class="btn btn-success btn-block">Búsqueda</button>
        </div>
      </form>
    </div>
  </div>
</section>

<section class="container my-5">
  <div class="row align-items-center">
    <div class="col-md-5 mb-3">
      <img src="<?php echo e(asset('img/hero-agrovida.png')); ?>" class="img-fluid rounded" alt="">
    </div>
    <div class="col-md-7">
      <h3 class="text-success font-weight-bold">
        Miles de productos de nuestra industria a un click
      </h3>
      <p class="text-muted">
        Encuentra anuncios de productos y servicios especializados y a sus proveedores directos.
      </p>
      <a href="<?php echo e(route('ads.index')); ?>" class="btn btn-success btn-lg px-4">Navega</a>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\dev\Proyecto-Mercado-Agricola-main\Proyecto-Mercado-Agricola-main\resources\views/public/home.blade.php ENDPATH**/ ?>