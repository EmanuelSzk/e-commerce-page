<?php

include '../php/conexion.php';

if ($conection->connect_error) {
    die("Error en la conexión");
}

$idProduct = $_POST['id_product'];

$sql = "INSERT INTO carrito (id_product, cantidad) VALUES ($idProduct, 1)";

if ($conection->query($sql) === TRUE) {
    echo "Producto agregado";
} else {
    echo "Error: " . $conection->error;
}

// $conection->close();
?>