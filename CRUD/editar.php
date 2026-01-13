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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="editar_guardar.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $producto['id'] ?>">

        <label>Nombre</label>
        <input type="text" name="nombre" value="<?= $producto['nombre'] ?>">

        <label>Descripcion</label>
        <input type="text" name="descripcion" value="<?= $producto['descripcion'] ?>">

        <label>Imagen</label>
        <input type="file" name="imagen" accept="image/*">

        <input type="hidden" name="imagen-actual" value="<?= $producto['imgURL'] ?>"

        <label>Imagen actual</label>
        <!--    arreglar width -->
        <img src= "../<?=$producto['imgURL']?>" width="200px">

        <label>Categoría</label>
        <input type="text" name="categoria" value="<?= $producto['categoria'] ?>">

        <label>Precio</label>
        <input type="number" name="precio" value="<?= $producto['precio'] ?>">

        <label>Stock</label>
        <input type="number" name="stock" value="<?= $producto['stock'] ?>">

        <button type="submit">Guardar cambios</button>
    </form>


</body>

</html>