

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">Editar Tipo de Animal</div>

    <div class="card-body">
        <form action="<?php echo e(route('tipo_animals.update', $tipoAnimal)); ?>" method="post">
            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <label>Nombre *</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo e($tipoAnimal->nombre); ?>" required>
            </div>

            <div class="form-group">
                <label>Descripción</label>
                <textarea class="form-control" name="descripcion"><?php echo e($tipoAnimal->descripcion); ?></textarea>
            </div>

            <button class="btn btn-primary">Actualizar</button>
            <a href="<?php echo e(route('tipo_animals.index')); ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlte', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\dev\Proyecto-Mercado-Agricola-main\Proyecto-Mercado-Agricola-main\resources\views/tipo_animals/edit.blade.php ENDPATH**/ ?>