<?php

include '../php/conexion.php';

$nombre = $_POST['nombre']; 
$imagen = $_FILES['imagen'];
$descripcion = $_POST['descripcion'];
$categoria = $_POST['categoria'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];

$carpeta = "/Sources/";
$nombreImagen = time() . "_" . basename($imagen['name']);
$imgURL = $carpeta . $nombreImagen;
move_uploaded_file($imagen['tmp_name'], ".." . $imgURL);

$sql = "INSERT INTO productos (nombre, imgURL, descripcion, categoria, precio, stock) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conection->prepare($sql);
$stmt->bind_param("ssssdi", $nombre, $imgURL, $descripcion, $categoria, $precio, $stock);
$stmt->execute();

header('location: ../pages/agregarProducto.php');

?>