

<?php $__env->startSection('title', 'Registrar Ganado'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Registrar Nuevo Ganado</h1>
        <a href="<?php echo e(route('ganados.index')); ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="<?php echo e(route('ganados.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="form-group mb-3">
                    <label for="nombre">Nombre *</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo e(old('nombre')); ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label for="tipo">Tipo *</label>
                    <select name="tipo" id="tipo" class="form-control" required>
                        <option value="">Seleccione tipo</option>
                        <option value="Vaca">Vaca</option>
                        <option value="Toro">Toro</option>
                        <option value="Ternero">Ternero</option>
                        <option value="Novillo">Novillo</option>
                        <option value="Becerra">Becerra</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="edad">Edad (meses)</label>
                    <input type="number" name="edad" id="edad" class="form-control" min="0" value="<?php echo e(old('edad')); ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="peso">Peso (kg)</label>
                    <input type="number" name="peso" id="peso" class="form-control" min="0" step="0.01" value="<?php echo e(old('peso')); ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="sexo">Sexo</label>
                    <select name="sexo" id="sexo" class="form-control">
                        <option value="">Seleccione</option>
                        <option value="Macho">Macho</option>
                        <option value="Hembra">Hembra</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="categoria_id">Categoría *</label>
                    <select name="categoria_id" id="categoria_id" class="form-control" required>
                        <option value="">Seleccione una categoría</option>
                        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($categoria->id); ?>"><?php echo e($categoria->nombre); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" rows="3"><?php echo e(old('descripcion')); ?></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="precio">Precio (Bs)</label>
                    <input type="number" name="precio" id="precio" class="form-control" step="0.01" min="0" value="<?php echo e(old('precio')); ?>">
                </div>

                <div class="form-group mb-3">
                    <label for="imagen">Imagen</label>
                    <input type="file" name="imagen" id="imagen" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Guardar Registro
                </button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlte', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\dev\Proyecto-Mercado-Agricola-main\Proyecto-Mercado-Agricola-main\resources\views/ganados/create.blade.php ENDPATH**/ ?>