<?php
// Conectar BD...
include "../php/conexion.php";

$sql = "SELECT products.nombre, products.precio, products.imgURL, carrito.cantidad
        FROM carrito
        JOIN products ON carrito.id_product = products.id";

$result = $conection->query($sql);

$items = [];

while ($row = $result->fetch_assoc()) {
    $items[] = $row;
}

echo json_encode($items);
