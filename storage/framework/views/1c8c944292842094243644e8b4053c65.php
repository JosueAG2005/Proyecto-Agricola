<?php $__env->startSection('title', 'Gestión de Ganado'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Lista de Ganado</h1>
        <a href="<?php echo e(route('ganados.create')); ?>" class="btn btn-success">
            <i class="fas fa-plus-circle"></i> Nuevo Registro
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-bordered table-striped mb-0">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Edad</th>
                        <th>Peso (kg)</th>
                        <th>Sexo</th>
                        <th>Categoría</th>
                        <th>Precio (Bs)</th>
                        <th>Imagen</th>
                        <th style="width: 150px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $ganados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ganado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($ganado->id); ?></td>
                            <td><?php echo e($ganado->nombre); ?></td>
                            <td><?php echo e($ganado->tipo); ?></td>
                            <td><?php echo e($ganado->edad ?? '-'); ?></td>
                            <td><?php echo e($ganado->peso ?? '-'); ?></td>
                            <td><?php echo e($ganado->sexo ?? '-'); ?></td>
                            <td><?php echo e($ganado->categoria->nombre ?? '-'); ?></td>
                            <td><?php echo e($ganado->precio ? number_format($ganado->precio, 2) : '-'); ?></td>
                            <td>
                                <?php if($ganado->imagen): ?>
                                    <img src="<?php echo e(asset('storage/'.$ganado->imagen)); ?>" alt="imagen" width="60">
                                <?php else: ?>
                                    <span class="text-muted">Sin imagen</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(route('ganados.edit', $ganado->id)); ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="<?php echo e(route('ganados.destroy', $ganado->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este registro?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="10" class="text-center text-muted">No hay registros de ganado.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <?php echo e($ganados->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlte', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\dev\Proyecto-Mercado-Agricola-main\Proyecto-Mercado-Agricola-main\resources\views/ganados/index.blade.php ENDPATH**/ ?>