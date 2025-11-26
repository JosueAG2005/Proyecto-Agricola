

<?php $__env->startSection('title', 'Marcas de Maquinaria'); ?>
<?php $__env->startSection('page_title', 'Marcas de Maquinaria'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header d-flex align-items-center">
        <h3 class="card-title mb-0">Marcas de Maquinaria</h3>

        <form method="get" class="form-inline ml-auto">
            <input type="text" name="q" class="form-control form-control-sm mr-2" placeholder="Buscar..." value="<?php echo e($q ?? ''); ?>">
            <button class="btn btn-sm btn-primary">Buscar</button>
        </form>

        <a href="<?php echo e(route('admin.marcas_maquinarias.create')); ?>" class="btn btn-sm btn-success ml-2">
            <i class="fas fa-plus"></i> Nuevo
        </a>
    </div>

    <div class="card-body p-0">
        <?php if(session('ok')): ?>
        <div class="alert alert-success alert-dismissible fade show m-3">
            <i class="fas fa-check-circle"></i> <?php echo e(session('ok')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show m-3">
            <i class="fas fa-exclamation-circle"></i> <?php echo e(session('error')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>

        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th class="text-right pr-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($item->id); ?></td>
                    <td><strong><?php echo e($item->nombre); ?></strong></td>
                    <td><?php echo e($item->descripcion ?? '—'); ?></td>
                    <td class="text-right pr-3">
                        <a href="<?php echo e(route('admin.marcas_maquinarias.edit', $item)); ?>" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="<?php echo e(route('admin.marcas_maquinarias.destroy', $item)); ?>" method="post" class="d-inline">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar esta marca de maquinaria?')">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4" class="text-center text-muted py-4">
                        <i class="fas fa-info-circle"></i> No hay marcas de maquinaria registradas.
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        <?php echo e($items->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminlte', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\dev\Proyecto-Mercado-Agricola-main\Proyecto-Mercado-Agricola-main\resources\views/marcas_maquinarias/index.blade.php ENDPATH**/ ?>