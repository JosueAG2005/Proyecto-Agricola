<?php $__env->startSection('title','Publicita tu Anuncio'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
  <h5 class="mb-3 text-success">Llega a miles de productores y compradores de todo el país en minutos.</h5>

  <div class="row">
    
    <div class="col-lg-8">
      <div class="card shadow-sm rounded-lg">
        <div class="card-body">
          <form>
            <div class="form-group">
              <label class="font-weight-600">Título del anuncio <span class="text-danger">*</span></label>
              <input class="form-control form-control-lg project-input" placeholder="Ingrese el título">
            </div>

            <div class="form-group">
              <label class="font-weight-600">Categoría <span class="text-danger">*</span></label>
              <select class="form-control form-control-lg project-input">
                <option selected>Seleccione la categoría</option>
                <option>Animales</option>
                <option>Maquinaria</option>
                <option>Orgánico</option>
              </select>
            </div>

            <div class="form-group">
              <label class="font-weight-600">Precio</label>
              <input class="form-control form-control-lg project-input" placeholder="Ingrese el precio">
            </div>

            <div class="form-group">
              <label class="font-weight-600">Descripción <span class="text-danger">*</span></label>
              <textarea class="form-control project-input" rows="4" placeholder="Ingrese la descripción"></textarea>
            </div>

            <div class="form-group">
              <label class="font-weight-600 d-block">Imágenes <span class="text-danger">*</span></label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="img">
                <label class="custom-file-label" for="img">Subir foto</label>
              </div>
            </div>

            <button type="button" class="btn btn-success btn-lg btn-block mt-3">Publicar Anuncio</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-lg-4 mt-3 mt-lg-0">
      <div class="card shadow-sm rounded-lg">
        <div class="card-body">
          <h6 class="font-weight-bold text-success mb-3">Consejos para tu anuncio</h6>
          <ul class="mb-0 text-muted">
            <li>Usa un título claro y descriptivo.</li>
            <li>Agrega imágenes nítidas y reales.</li>
            <li>Describe detalles clave: estado, marca, certificados.</li>
            <li>Incluye datos de contacto actualizados.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
  document.addEventListener('change', function(e){
    if(e.target.classList.contains('custom-file-input')){
      e.target.nextElementSibling.innerText = e.target.files.length ? e.target.files[0].name : 'Subir foto';
    }
  });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\dev\Proyecto-Mercado-Agricola-main\Proyecto-Mercado-Agricola-main\resources\views/public/ads/create.blade.php ENDPATH**/ ?>