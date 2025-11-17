

<?php $__env->startSection('title', 'Nuevo Tipo de Peso'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-3">Nuevo Tipo de Peso</h1>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="<?php echo e(route('tipo-pesos.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control"></textarea>
                </div>

                <button class="btn btn-success">
                    <i class="fas fa-save"></i> Guardar
                </button>

                <a href="<?php echo e(route('tipo-pesos.index')); ?>" class="btn btn-secondary">
                    Cancelar
                </a>
            </form>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlte', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\dev\Proyecto-Mercado-Agricola-main\Proyecto-Mercado-Agricola-main\resources\views/tipo_pesos/create.blade.php ENDPATH**/ ?>