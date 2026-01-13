<?php
// Conectar BD...
include "../php/conexion.php";

session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["success" => false,
        "error" => "no_session",
        "message" => "El usuario no inició sesión"]);
    exit;
}

$idCarrito = $_POST['id_usuario'];

$idUsuario = $_SESSION['user_id'];

// SELECT p.id, p.nombre, p.precio, p.imgURL, c.cantidad, cu.id_usuario FROM carrito c JOIN productos p ON c.id_product = p.id JOIN carritos_users cu WHERE c.id_carrito = cu.id;

$sql = "SELECT p.id, p.nombre, p.precio, p.imgURL, c.cantidad, cu.id_usuario FROM carrito c JOIN productos p ON c.id_product = p.id JOIN carritos_users cu ON c.id_Carrito = cu.id WHERE c.id_carrito = (?)";
$stmt = $conection->prepare($sql);
$stmt->bind_param("i", $idCarrito);
$stmt->execute();

$result = $stmt->get_result();

$items = [];

while ($row = $result->fetch_assoc()) {
    $items[] = $row;
}

echo json_encode($items);

?>