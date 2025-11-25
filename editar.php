<?php
    include 'bd.php';

    $id = $_GET['id'];
    $panes = seleccionar("select * from pan where id_pan = $1", [$id]);
    
    if (empty($panes)) {
        header('Location: index.php');
        exit;
    }
    
    $pan = $panes[0];

    $categorias = seleccionar("select * from categoria order by nombre", []);
?>

<!DOCTYPE html>
<html>
<head>
    <title>(๑ᵔ⤙ᵔ๑) - Editar</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container mt-4 mb-4">
        
        <div class="card shadow-sm border-0">
            
            <div class="card-header bg-dark text-white">
                <h1 class="h4 mb-0">Editando: <?php echo htmlspecialchars($pan['nombre']); ?> ~</h1>
            </div>

            <div class="card-body">
                <form action="guardar.php" method="POST">
                    <input type="hidden" name="id_pan" value="<?php echo $pan['id_pan']; ?>">
            <div class="mb-3">
                <label class="form-label">Nombre del Pan</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo htmlspecialchars($pan['nombre']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                    <textarea class="form-control" name="descripcion" rows="2" placeholder="Ej: Suave y esponjoso..."><?php echo htmlspecialchars($pan['descripcion']); ?></textarea>
            </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Costo $$</label>
                            <input type="number" class="form-control" name="precio" step="0.01" min="0" value="<?php echo $pan['precio']; ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">En el estante</label>
                            <input type="number" class="form-control" name="stock" min="0" value="<?php echo $pan['stock']; ?>" required>
                    </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tipo de Pan</label>
                        <select class="form-select" name="id_cat">
                            <option value="" <?php echo ($pan['id_cat'] == NULL) ? 'selected' : ''; ?>
                                > (Misterioso...)
                            </option>
                            
                            <?php foreach ($categorias as $cat): ?>
                                    <option 
                                        value="<?php echo $cat['id_cat']; ?>"
                                    <?php echo ($cat['id_cat'] == $pan['id_cat']) ? 'selected' : ''; ?>
                                    >
                                    <?php echo htmlspecialchars($cat['nombre']); ?>
                                    </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <hr>
                    <div class="text-end">
                        <a href="index.php" class="btn btn-secondary">
                            <i class="bi bi-x-lg"></i>
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg"></i>
                            Actualizar Pan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>