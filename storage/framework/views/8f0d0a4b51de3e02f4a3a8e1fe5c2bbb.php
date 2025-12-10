

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h1 class="h3 mb-1 text-dark">
                    <i class="fas fa-chart-line text-success"></i> Dashboard del Mercado Agrícola
                </h1>
                <p class="text-muted mb-0">
                    Resumen general de animales, maquinaria y productos orgánicos publicados en la plataforma.
                </p>
                <small class="text-muted">
                    <?php if(request('desde') || request('hasta') || request('tipo')): ?>
                        Vista filtrada
                        <?php if(request('desde')): ?>
                            desde <strong><?php echo e(request('desde')); ?></strong>
                        <?php endif; ?>
                        <?php if(request('hasta')): ?>
                            hasta <strong><?php echo e(request('hasta')); ?></strong>
                        <?php endif; ?>
                        <?php if(request('tipo')): ?>
                            <?php
                                $labelTipo =
                                    [
                                        'ganado' => 'Animales',
                                        'maquinaria' => 'Maquinaria',
                                        'organico' => 'Orgánicos',
                                    ][request('tipo')] ?? 'Todos';
                            ?>
                            · Tipo: <strong><?php echo e($labelTipo); ?></strong>
                        <?php endif; ?>
                    <?php else: ?>
                        Mostrando información global del sistema (todos los tipos y fechas).
                    <?php endif; ?>
                </small>
            </div>

            <div class="text-right">
                <span class="badge badge-success">
                    <i class="fas fa-circle mr-1"></i> Sistema operativo
                </span>
                <?php if(isset($ultimaActualizacion)): ?>
                    <div class="small text-muted mt-1">
                        Última actualización: <?php echo e($ultimaActualizacion); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="card mb-4">
            <div class="card-body py-2">
                <form method="GET">
                    <div class="form-row align-items-end">
                        <div class="col-md-3 col-sm-6 mb-2">
                            <label class="small mb-1">Desde</label>
                            <input type="date" name="desde" value="<?php echo e(request('desde')); ?>"
                                class="form-control form-control-sm">
                        </div>

                        <div class="col-md-3 col-sm-6 mb-2">
                            <label class="small mb-1">Hasta</label>
                            <input type="date" name="hasta" value="<?php echo e(request('hasta')); ?>"
                                class="form-control form-control-sm">
                        </div>

                        <div class="col-md-3 col-sm-6 mb-2">
                            <label class="small mb-1">Tipo de publicación</label>
                            <select name="tipo" class="form-control form-control-sm">
                                <option value="">Todos</option>
                                <option value="ganado" <?php echo e(request('tipo') == 'ganado' ? 'selected' : ''); ?>>Animales</option>
                                <option value="maquinaria" <?php echo e(request('tipo') == 'maquinaria' ? 'selected' : ''); ?>>
                                    Maquinaria</option>
                                <option value="organico" <?php echo e(request('tipo') == 'organico' ? 'selected' : ''); ?>>Orgánicos
                                </option>
                            </select>
                        </div>

                        <div class="col-md-3 col-sm-6 mb-2 d-flex">
                            <button class="btn btn-success btn-sm mr-2 flex-fill">
                                <i class="fas fa-filter mr-1"></i> Aplicar filtros
                            </button>
                            <a href="<?php echo e(url()->current()); ?>" class="btn btn-outline-secondary btn-sm flex-fill">
                                <i class="fas fa-undo mr-1"></i> Limpiar
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php
            // Usamos la variable $tipo que viene del controlador, pero si no está, usamos request('tipo')
            $tipoFiltro = $tipo ?? request('tipo');
        ?>

        
        <div class="row">
            <?php if(!$tipoFiltro || $tipoFiltro === 'ganado'): ?>
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo e($totalGanado); ?></h3>
                            <p>Animales publicados</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-horse"></i>
                        </div>
                        <a href="<?php echo e(route('ganados.index')); ?>" class="small-box-footer">
                            Ver todos los animales <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(!$tipoFiltro || $tipoFiltro === 'maquinaria'): ?>
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo e($totalMaquinaria); ?></h3>
                            <p>Maquinaria publicada</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-tractor"></i>
                        </div>
                        <a href="<?php echo e(route('maquinarias.index')); ?>" class="small-box-footer">
                            Ver toda la maquinaria <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(!$tipoFiltro || $tipoFiltro === 'organico'): ?>
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo e($totalOrganicos); ?></h3>
                            <p>Productos orgánicos publicados</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-carrot"></i>
                        </div>
                        <a href="<?php echo e(route('organicos.index')); ?>" class="small-box-footer text-dark">
                            Ver todos los orgánicos <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            <?php endif; ?>

            
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3><?php echo e($totalPublicaciones); ?></h3>
                        <p>Total de publicaciones</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <span class="small-box-footer">
                        Mercado general
                    </span>
                </div>
            </div>
        </div>

        
        <div class="row">
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card shadow-sm border-left-success h-100">
                    <div class="card-body">
                        <h6 class="text-muted mb-1">
                            <i class="fas fa-calendar-day text-success mr-1"></i> Publicaciones de hoy
                        </h6>
                        <h3 class="mb-0"><?php echo e($totalHoy); ?></h3>
                        <small class="text-muted">Animales, maquinaria y orgánicos creados hoy.</small>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card shadow-sm border-left-info h-100">
                    <div class="card-body">
                        <h6 class="text-muted mb-1">
                            <i class="fas fa-calendar-week text-info mr-1"></i> Últimos 7 días
                        </h6>
                        <h3 class="mb-0"><?php echo e($totalSemana); ?></h3>
                        <small class="text-muted d-block mb-1">Nuevas publicaciones en la última semana.</small>
                        <?php if(isset($variacionSemanaPorcentaje)): ?>
                            <span class="badge badge-<?php echo e($variacionSemanaPorcentaje >= 0 ? 'success' : 'danger'); ?>">
                                <i class="fas fa-arrow-<?php echo e($variacionSemanaPorcentaje >= 0 ? 'up' : 'down'); ?> mr-1"></i>
                                <?php echo e(number_format($variacionSemanaPorcentaje, 1)); ?>% vs semana anterior
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card shadow-sm border-left-warning h-100">
                    <div class="card-body">
                        <h6 class="text-muted mb-1">
                            <i class="fas fa-calendar-alt text-warning mr-1"></i> Mes actual
                        </h6>
                        <h3 class="mb-0"><?php echo e($totalMes); ?></h3>
                        <small class="text-muted d-block mb-1">Publicaciones registradas en el mes en curso.</small>
                        <?php if(isset($variacionMesPorcentaje)): ?>
                            <span class="badge badge-<?php echo e($variacionMesPorcentaje >= 0 ? 'success' : 'danger'); ?>">
                                <i class="fas fa-arrow-<?php echo e($variacionMesPorcentaje >= 0 ? 'up' : 'down'); ?> mr-1"></i>
                                <?php echo e(number_format($variacionMesPorcentaje, 1)); ?>% vs mes anterior
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card shadow-sm border-left-primary h-100">
                    <div class="card-body">
                        <h6 class="text-muted mb-1">
                            <i class="fas fa-balance-scale text-primary mr-1"></i> Promedio diario (mes)
                        </h6>
                        <?php if(isset($promedioPublicacionesDiaMes)): ?>
                            <h3 class="mb-0"><?php echo e(number_format($promedioPublicacionesDiaMes, 1)); ?></h3>
                        <?php else: ?>
                            <h3 class="mb-0">—</h3>
                        <?php endif; ?>
                        <small class="text-muted">Promedio de publicaciones por día en el mes actual.</small>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="row mb-3">
            <?php if(!$tipoFiltro || $tipoFiltro === 'ganado'): ?>
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Participación de Animales</h6>
                                <h3 class="mb-0"><?php echo e($porcentajeGanado); ?>%</h3>
                                <small class="text-muted">Sobre el total de publicaciones.</small>
                            </div>
                            <i class="fas fa-horse fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(!$tipoFiltro || $tipoFiltro === 'maquinaria'): ?>
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Participación de Maquinaria</h6>
                                <h3 class="mb-0"><?php echo e($porcentajeMaquinaria); ?>%</h3>
                                <small class="text-muted">Sobre el total de publicaciones.</small>
                            </div>
                            <i class="fas fa-tractor fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(!$tipoFiltro || $tipoFiltro === 'organico'): ?>
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-1">Participación de Orgánicos</h6>
                                <h3 class="mb-0"><?php echo e($porcentajeOrganicos); ?>%</h3>
                                <small class="text-muted">Sobre el total de publicaciones.</small>
                            </div>
                            <i class="fas fa-leaf fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="col-md-3 mb-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Vendedores activos</h6>
                            <?php if(isset($totalVendedoresActivos)): ?>
                                <h3 class="mb-0"><?php echo e($totalVendedoresActivos); ?></h3>
                            <?php else: ?>
                                <h3 class="mb-0">—</h3>
                            <?php endif; ?>
                            <small class="text-muted">Usuarios con publicaciones recientes.</small>
                        </div>
                        <i class="fas fa-user-check fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header border-0 bg-light d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">
                            <i class="fas fa-chart-bar text-success mr-1"></i> Publicaciones por categoría
                        </h3>
                        <small class="text-muted">Distribución actual por tipo.</small>
                    </div>
                    <div class="card-body">
                        <div style="height: 260px;">
                            <canvas id="graficoCategorias"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header border-0 bg-light d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">
                            <i class="fas fa-chart-area text-success mr-1"></i> Evolución últimos 6 meses
                        </h3>
                        <small class="text-muted">Tendencia por tipo de publicación.</small>
                    </div>
                    <div class="card-body">
                        <div style="height: 260px;">
                            <canvas id="graficoMeses"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="row">
            <?php if(!$tipoFiltro || $tipoFiltro === 'ganado'): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header border-0 d-flex align-items-center bg-light">
                            <i class="fas fa-horse text-success mr-2"></i>
                            <h3 class="card-title mb-0">Animales</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted small">
                                Estadísticas y publicaciones de ganado disponible en el mercado.
                            </p>
                            <ul class="small mb-3">
                                <li>Control de animales registrados.</li>
                                <li>Acceso rápido al listado completo.</li>
                            </ul>
                            <a href="<?php echo e(route('ganados.index')); ?>" class="btn btn-sm btn-success">
                                Ir a animales
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(!$tipoFiltro || $tipoFiltro === 'maquinaria'): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header border-0 d-flex align-items-center bg-light">
                            <i class="fas fa-tractor text-info mr-2"></i>
                            <h3 class="card-title mb-0">Maquinaria</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted small">
                                Seguimiento de la oferta de maquinaria agrícola disponible.
                            </p>
                            <ul class="small mb-3">
                                <li>Resumen de equipos publicados.</li>
                                <li>Monitoreo de oferta por tipo.</li>
                            </ul>
                            <a href="<?php echo e(route('maquinarias.index')); ?>" class="btn btn-sm btn-info">
                                Ir a maquinaria
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(!$tipoFiltro || $tipoFiltro === 'organico'): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header border-0 d-flex align-items-center bg-light">
                            <i class="fas fa-leaf text-warning mr-2"></i>
                            <h3 class="card-title mb-0">Productos orgánicos</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted small">
                                Visualiza rápidamente la cantidad de productos orgánicos disponibles.
                            </p>
                            <ul class="small mb-3">
                                <li>Control de productos registrados.</li>
                                <li>Acceso rápido a listado y detalles.</li>
                            </ul>
                            <a href="<?php echo e(route('organicos.index')); ?>" class="btn btn-sm btn-warning text-white">
                                Ir a orgánicos
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // === GRÁFICO BARRAS: PUBLICACIONES POR CATEGORÍA ===
            var ctxCategorias = document.getElementById('graficoCategorias').getContext('2d');

            var labelsCat = [];
            var dataCat = [];
            var bgCat = [];
            var borderCat = [];

            <?php if(!$tipoFiltro || $tipoFiltro === 'ganado'): ?>
                labelsCat.push('Animales');
                dataCat.push(<?php echo e($totalGanado); ?>);
                bgCat.push('rgba(40, 167, 69, 0.7)');
                borderCat.push('rgba(40, 167, 69, 1)');
            <?php endif; ?>

            <?php if(!$tipoFiltro || $tipoFiltro === 'maquinaria'): ?>
                labelsCat.push('Maquinaria');
                dataCat.push(<?php echo e($totalMaquinaria); ?>);
                bgCat.push('rgba(23, 162, 184, 0.7)');
                borderCat.push('rgba(23, 162, 184, 1)');
            <?php endif; ?>

            <?php if(!$tipoFiltro || $tipoFiltro === 'organico'): ?>
                labelsCat.push('Orgánicos');
                dataCat.push(<?php echo e($totalOrganicos); ?>);
                bgCat.push('rgba(255, 193, 7, 0.7)');
                borderCat.push('rgba(255, 193, 7, 1)');
            <?php endif; ?>

            new Chart(ctxCategorias, {
                type: 'bar',
                data: {
                    labels: labelsCat,
                    datasets: [{
                        label: 'Publicaciones registradas',
                        data: dataCat,
                        backgroundColor: bgCat,
                        borderColor: borderCat,
                        borderWidth: 1
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return context.parsed.y + ' publicación(es)';
                                }
                            }
                        }
                    }
                }
            });

            // === GRÁFICO LÍNEAS: EVOLUCIÓN 6 MESES ===
            var ctxMeses = document.getElementById('graficoMeses').getContext('2d');

            var datasetsMeses = [];

            <?php if(!$tipoFiltro || $tipoFiltro === 'ganado'): ?>
                datasetsMeses.push({
                    label: 'Animales',
                    data: <?php echo json_encode($ganadoPorMes); ?>,
                    borderColor: 'rgba(40, 167, 69, 1)',
                    backgroundColor: 'rgba(40, 167, 69, 0.2)',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true
                });
            <?php endif; ?>

            <?php if(!$tipoFiltro || $tipoFiltro === 'maquinaria'): ?>
                datasetsMeses.push({
                    label: 'Maquinaria',
                    data: <?php echo json_encode($maquinariaPorMes); ?>,
                    borderColor: 'rgba(23, 162, 184, 1)',
                    backgroundColor: 'rgba(23, 162, 184, 0.2)',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true
                });
            <?php endif; ?>

            <?php if(!$tipoFiltro || $tipoFiltro === 'organico'): ?>
                datasetsMeses.push({
                    label: 'Orgánicos',
                    data: <?php echo json_encode($organicosPorMes); ?>,
                    borderColor: 'rgba(255, 193, 7, 1)',
                    backgroundColor: 'rgba(255, 193, 7, 0.2)',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true
                });
            <?php endif; ?>

            new Chart(ctxMeses, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($labelsMeses); ?>,
                    datasets: datasetsMeses
                },
                options: {
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return context.dataset.label + ': ' + context.parsed.y +
                                        ' publicaciones';
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlte', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Nicole\proyecto\Proyecto-Agricola\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>