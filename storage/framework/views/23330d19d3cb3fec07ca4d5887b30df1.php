

<?php $__env->startSection('title','Nuevo Registro Sanitario'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-3">Nuevo Registro Sanitario</h1>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="<?php echo e(route('datos-sanitarios.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="mb-3">
                    <label>Animal</label>
                    <select name="ganado_id" class="form-control" required>
                        <option value="">Seleccione...</option>
                        <?php $__currentLoopData = $ganados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($g->id); ?>"><?php echo e($g->nombre); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Vacuna</label>
                    <input type="text" name="vacuna" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Tratamiento</label>
                    <input type="text" name="tratamiento" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Medicamento</label>
                    <input type="text" name="medicamento" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Fecha Aplicación</label>
                    <input type="date" name="fecha_aplicacion" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Próxima Fecha</label>
                    <input type="date" name="proxima_fecha" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Veterinario</label>
                    <input type="text" name="veterinario" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Observaciones</label>
                    <textarea name="observaciones" class="form-control"></textarea>
                </div>

                <button class="btn btn-success">Guardar</button>
                <a href="<?php echo e(route('datos-sanitarios.index')); ?>" class="btn btn-secondary">Cancelar</a>

            </form>

        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlte', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\dev\Proyecto-Mercado-Agricola-main\Proyecto-Mercado-Agricola-main\resources\views/datos_sanitarios/create.blade.php ENDPATH**/ ?>