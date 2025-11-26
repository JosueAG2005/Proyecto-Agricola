

<?php $__env->startSection('title', 'Editar Tipo de Peso'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-3">Editar Tipo de Peso</h1>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="<?php echo e(route('admin.tipo-pesos.update', $tipoPeso->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="<?php echo e($tipoPeso->nombre); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control"><?php echo e($tipoPeso->descripcion); ?></textarea>
                </div>

                <button class="btn btn-primary">
                    <i class="fas fa-save"></i> Actualizar
                </button>

                <a href="<?php echo e(route('admin.tipo-pesos.index')); ?>" class="btn btn-secondary">
                    Cancelar
                </a>
            </form>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlte', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\dev\Proyecto-Mercado-Agricola-main\Proyecto-Mercado-Agricola-main\resources\views/tipo_pesos/edit.blade.php ENDPATH**/ ?>