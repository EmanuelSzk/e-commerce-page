<?php

include '../php/conexion.php';

if ($conection->connect_error) {
    die("Error en la conexión");
}

/* Validamos que existe el dato del fetch */
if (!isset($_POST['id_product'])) {
    echo "falta el id del producto";
    exit;
}

$idProduct = intval($_POST['id_product']);

$sql = "DELETE FROM carrito WHERE id_product = ?";
$stmt = $conection->prepare($sql);
$stmt->bind_param("i", $idProduct);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "se eliminó con exito"]);
} else {
    echo json_encode(["success" => false, "error" => $conection->error]);
}

$stmt->close();

?>