<?php
    include 'bd.php';
    $categorias = seleccionar("select * from categoria order by nombre", []);
?>

<!DOCTYPE html>
<html>
<head>
        <title>(๑ᵔ⤙ᵔ๑) - Agregar</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container mt-4 mb-4">
        
        <div class="card shadow-sm border-0">

            <div class="card-header bg-dark text-white">
                <h1 class="h4 mb-0">Agregar Nuevo Pan</h1>
            </div>

            <div class="card-body">
                <form action="guardar.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nombre del Pan</label>
                    <input type="text" class="form-control" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea class="form-control" name="descripcion" rows="2" placeholder="Ej: Suave y esponjoso..."></textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Costo $$</label>
                            <input type="number" class="form-control" name="precio" step="0.01" min="0" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Stock Inicial</label>
                            <input type="number" class="form-control" name="stock" value="0" min="0" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tipo de Pan</label>
                        <select class="form-select" name="id_cat">
                            <option value="">(Misterioso...)</option>
                            <?php foreach ($categorias as $cat): ?>
                                <option value="<?php echo $cat['id_cat']; ?>">
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
                            Guardar Pan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>