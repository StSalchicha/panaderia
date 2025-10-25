<?php
    include 'bd.php';
    $query = "
        select
            p.id_pan, p.nombre, p.precio, p.stock, 
            c.nombre as categoria_nombre 
        from 
            pan p
        left join 
            categoria c on p.id_cat = c.id_cat
        order by 
            p.id_pan
    ";
    $panes = seleccionar($query, []);
?>

<!DOCTYPE html>
<html>
<head>
    <title>(๑ᵔ⤙ᵔ๑)</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        .card-body .table { margin-bottom: 0; }
        .btn-sm .bi { vertical-align: middle; margin-top: -3px; }
    </style>
</head>
<body>
    <div class="container mt-4 mb-4">
        
        <div class="card shadow-sm border-0">
            
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                
                <h1 class="h4 mb-0">Inventario de Panes</h1>
                
                <a href="crear.php" class="btn btn-success">
                    <i class="bi bi-plus-circle-fill"></i>
                    Agregar Pan
                </a>
            </div>

            <div class="card-body">
                <table class="table table-striped table-hover table-bordered align-middle">
                    
                    <thead class="table-dark">
                        <tr>
                            <th>Nº</th>
                            <th>Nombre del Pan</th>
                            <th>Costo $$</th>
                            <th>En el estante</th>
                            <th>Tipo de Pan</th>
                            <th class="text-center">¿Qué harás?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($panes as $pan): ?>
                        <tr>
                            <td><small class="text-muted"><?php echo $pan['id_pan']; ?></small></td>
                            <td><?php echo htmlspecialchars($pan['nombre']); ?></td>
                            <td>$<?php echo number_format($pan['precio'], 2); ?></td>
                            
                            <td>
                                <?php if ($pan['stock'] > 0): ?>
                                    <span class="badge bg-success"><?php echo $pan['stock']; ?> Piezas</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">¡Ya se acabaron!</span>
                                <?php endif; ?>
                            </td>
                            
                            <td>
                                <?php if ($pan['categoria_nombre']): ?>
                                    <span class="badge bg-primary"><?php echo htmlspecialchars($pan['categoria_nombre']); ?></span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Misterioso...</span>
                                <?php endif; ?>
                            </td>
                            
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Opciones para el pan">
                                    <a href="editar.php?id=<?php echo $pan['id_pan']; ?>" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    <a href="eliminar.php?id=<?php echo $pan['id_pan']; ?>" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>
</html>