<?php

include '../php/conexion.php';

if ($conection->connect_error) {
    die("Error en la conexión");
}

$idProduct = $_POST['id_product'];
$idCarrito = $_POST['id_carrito'];

$sql = "INSERT INTO carrito (id_product, cantidad, id_carrito) VALUES ($idProduct, 1, $idCarrito)";

if ($conection->query($sql) === TRUE) {

    $sqlproducto = "SELECT id, nombre, precio, imgURL FROM productos WHERE id = $idProduct";
    $resultado = $conection->query($sqlproducto);

    if ($resultado && $resultado->num_rows > 0) {
        $producto = $resultado->fetch_assoc();
        echo json_encode([
            "success" => true,
            "producto" => $producto
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "error" => "no se encontró el producto"
        ]);
    } 

} else {
    echo json_encode([
        "success" => false,
        "error" => "error al insertar: " .$conection->error
    ]);
}

// $conection->close();
?>