<?php
include '../php/conexion.php';

$id = $_GET['id'];

$sql = "SELECT * FROM productos WHERE id = ?";

$stmt = $conection->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$producto = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto - Dulces Juliana</title>
    <link rel="stylesheet" href="../Styles/Style.css?v=1.1s">
    <link href="https://fonts.googleapis.com/css2?family=Calistoga&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>
    <main>
        <div class="editar-container">
            <h2 class="editar-title">
                <i class="fas fa-edit"></i>
                Editar Producto
            </h2>

            <form class="editar-form" action="editar_guardar.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                <input type="hidden" name="imagen-actual" value="<?= $producto['imgURL'] ?>">

                <div class="form-row">
                    <div class="form-group">
                        <label for="nombre">
                            <i class="fas fa-tag"></i> Nombre
                        </label>
                        <input type="text" id="nombre" name="nombre" value="<?= $producto['nombre'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="categoria">
                            <i class="fas fa-list"></i> Categoría
                        </label>
                        <input type="text" id="categoria" name="categoria" value="<?= $producto['categoria'] ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="descripcion">
                        <i class="fas fa-align-left"></i> Descripción
                    </label>
                    <input type="text" id="descripcion" name="descripcion" value="<?= $producto['descripcion'] ?>" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="precio">
                            <i class="fas fa-dollar-sign"></i> Precio
                        </label>
                        <input type="number" id="precio" name="precio" step="0.01" value="<?= $producto['precio'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="stock">
                            <i class="fas fa-box"></i> Stock
                        </label>
                        <input type="number" id="stock" name="stock" value="<?= $producto['stock'] ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>
                        <i class="fas fa-image"></i> Imagen Actual
                    </label>
                    <div class="imagen-preview">
                        <img src="../<?= $producto['imgURL'] ?>" alt="<?= $producto['nombre'] ?>">
                        <span class="imagen-preview-label">Vista previa de la imagen actual</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="file-input">
                        <i class="fas fa-upload"></i> Nueva Imagen (opcional)
                    </label>
                    <div class="file-input-wrapper">
                        <label for="file-input" class="file-input-label">
                            <i class="fas fa-cloud-upload-alt"></i>
                            Seleccionar imagen
                        </label>
                        <input type="file" id="file-input" name="imagen" accept="image/*">
                        <span class="file-name" id="file-name">No se ha seleccionado ningún archivo</span>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="../pages/agregarProducto.php" class="btn-cancelar">
                        <i class="fas fa-arrow-left"></i>
                        Cancelar
                    </a>
                    <button type="submit" class="btn-guardar">
                        <i class="fas fa-save"></i>
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script>
        document.getElementById('file-input').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'No se ha seleccionado ningún archivo';
            document.getElementById('file-name').textContent = fileName;
        });
    </script>
</body>

</html>