<?php

include '../php/conexion.php';

$id = $_GET['id'];

$query = "SELECT imgURL FROM productos WHERE id = ?";
$stmt = $conection->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$producto = $result->fetch_assoc();

$rutaArchivo = __DIR__ . "/../" . $producto['imgURL'];

if (file_exists($rutaArchivo)) {
    unlink($rutaArchivo);
}

$sql = "DELETE FROM productos WHERE id = ?";
$stmt = $conection->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

header('location: ../pages/agregarProducto.php');

?>