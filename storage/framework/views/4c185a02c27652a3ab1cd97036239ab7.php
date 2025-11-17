

<?php $__env->startSection('title', 'Editar Raza'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-3">Editar Raza</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="<?php echo e(route('razas.update', $raza->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="mb-3">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="<?php echo e($raza->nombre); ?>" required>
                </div>

                <div class="mb-3">
                    <label>Tipo de Animal</label>
                    <select name="tipo_animal_id" class="form-control" required>
                        <?php $__currentLoopData = $tipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($t->id); ?>" <?php echo e($raza->tipo_animal_id == $t->id ? 'selected' : ''); ?>>
                                <?php echo e($t->nombre); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Descripción</label>
                    <textarea name="descripcion" class="form-control"><?php echo e($raza->descripcion); ?></textarea>
                </div>

                <button class="btn btn-primary">Actualizar</button>
                <a href="<?php echo e(route('razas.index')); ?>" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlte', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\dev\Proyecto-Mercado-Agricola-main\Proyecto-Mercado-Agricola-main\resources\views/razas/edit.blade.php ENDPATH**/ ?>