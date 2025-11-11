<?php $__env->startSection('title','Anuncios'); ?>

<?php $__env->startSection('content'); ?>
<section class="container py-4">

  <h2 class="text-center text-success mb-4">Anuncios</h2>

  
  <form class="row justify-content-center mb-4">
    <div class="col-lg-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-search"></i></span>
        </div>
        <input class="form-control" placeholder="Buscar productos, marcas, lugares…">
        <div class="input-group-append">
          <button class="btn btn-success">Búsqueda</button>
        </div>
      </div>
    </div>
  </form>

  
  <div class="row">
    
    <div class="col-md-6 col-lg-4 mb-4">
      <div class="card h-100 shadow-sm rounded-lg card-ad">
        <img src="https://cdn.pixabay.com/photo/2019/08/22/09/09/cows-4423003_1280.jpg" class="ad-img" alt="Terneros Holstein">
        <div class="card-body">
          <h5 class="card-title mb-1 line-clamp-2">Terneros Holstein</h5>
          <ul class="ad-meta">
            <li>Santa Cruz</li>
            <li>Vacunación al día</li>
            <li>6–8 meses</li>
          </ul>
          <span class="badge badge-success badge-pill px-3">Animales</span>
        </div>
        <div class="card-footer d-flex justify-content-between align-items-center">
          <span class="price">Bs 10.000</span>
          <a href="<?php echo e(route('organicos.index')); ?>" class="btn btn-success btn-sm px-3">Ver Anuncio</a>
        </div>
      </div>
    </div>

    
    <div class="col-md-6 col-lg-4 mb-4">
      <div class="card h-100 shadow-sm rounded-lg card-ad">
        <img src="https://th.bing.com/th/id/R.78e2d6c8fba9ee6f319568d9710482dc?rik=4OFXNOTXWU4i3g&pid=ImgRaw&r=0" class="ad-img" alt="Tractor John Deere">
        <div class="card-body">
          <h5 class="card-title mb-1 line-clamp-2">Tractor John Deere</h5>
          <ul class="ad-meta">
            <li>Cochabamba</li>
            <li>6110D 4x4</li>
            <li>3.500h</li>
          </ul>
          <span class="badge badge-info badge-pill px-3">Maquinaria</span>
        </div>
        <div class="card-footer d-flex justify-content-between align-items-center">
          <span class="price">Bs 23.000</span>
          <a href="<?php echo e(route('maquinarias.index')); ?>" class="btn btn-success btn-sm px-3">Ver Anuncio</a>
        </div>
      </div>
    </div>

    
    <div class="col-md-6 col-lg-4 mb-4">
      <div class="card h-100 shadow-sm rounded-lg card-ad">
        <img src="https://www.pressesante.com/wp-content/uploads/2022/05/legumes-toxiques-Freepik.jpg" class="ad-img" alt="Hortalizas a granel">
        <div class="card-body">
          <h5 class="card-title mb-1 line-clamp-2">Hortalizas de temporada a granel</h5>
          <ul class="ad-meta">
            <li>Oruro</li>
            <li>Producto Directo</li>
          </ul>
          <span class="badge badge-success badge-pill px-3">Orgánico</span>
        </div>
        <div class="card-footer d-flex justify-content-between align-items-center">
          <span class="price">Bs 12/kg</span>
          <a href="<?php echo e(route('organicos.index')); ?>" class="btn btn-success btn-sm px-3">Ver Anuncio</a>
        </div>
      </div>
    </div>
  </div>

</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\dev\Proyecto-Mercado-Agricola-main\Proyecto-Mercado-Agricola-main\resources\views/public/ads/index.blade.php ENDPATH**/ ?>