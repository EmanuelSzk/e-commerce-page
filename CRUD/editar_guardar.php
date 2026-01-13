<?php

include '../php/conexion.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$imagenActual = $_POST['imagen-actual'];
$descripcion = $_POST['descripcion'];
$categoria = $_POST['categoria'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];

if (!empty($_FILES['imagen']['name'])) {

    $imagen = $_FILES['imagen'];
    $carpeta = "Sources/";
    $nombreImagen = basename($imagen['name']);
    $imgURL = $carpeta . $nombreImagen;
    move_uploaded_file($imagen['tmp_name'], "../" . $imgURL);    

    } else {
        $imgURL = $imagenActual;
    }

$sql = "UPDATE productos SET nombre = ?, descripcion = ?, imgURL = ?,categoria = ?, precio = ?, stock = ? WHERE id = ?";
$stmt = $conection->prepare($sql);
$stmt->bind_param("ssssdii", $nombre, $descripcion, $imgURL, $categoria, $precio, $stock, $id);
$stmt->execute();

header("location: ../pages/agregarProducto.php");

?>