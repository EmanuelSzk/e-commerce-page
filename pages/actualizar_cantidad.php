<?php
include "../php/conexion.php";

if (!isset($_POST['id_product']) || !isset($_POST['cantidad'])) {
    echo json_encode(["error" => "Faltan datos"]);
    exit;
}

$id = intval($_POST['id_product']);
$cantidad = intval($_POST['cantidad']);

$sql = "UPDATE carrito SET cantidad = ? WHERE id_product = ?";
$stmt = $conection->prepare($sql);
$stmt->bind_param("ii", $cantidad, $id);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "nuevaCantidad" => $cantidad]);
} else {
    echo json_encode(["success" => false, "error" => $conection->error]);
}


$conection->close();
$stmt->close();

?>