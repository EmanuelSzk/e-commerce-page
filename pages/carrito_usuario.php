<?php

include '../php/conexion.php';

session_start();

if ($conection->connect_error) {
    die("Error en la conexión");
}

$idUsuario = $_SESSION['user_id'];

if (!isset($_SESSION['user_id'])) {
    echo json_encode([
        "success" => false,
        "error" => "no_session",
        "message" => "El usuario SI inició sesión " . $idUsuario
    ]);
    exit;
}

$verificación = "SELECT id_usuario FROM carritos_users WHERE id_usuario = (?)";
$stmt = $conection->prepare($verificación);
$stmt->bind_param("i", $idUsuario);
$usuario = $stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $sql = "INSERT INTO carritos_users (id_usuario) VALUES (?)";
    $stmt = $conection->prepare($sql);

    if (!$stmt) {
        die("error en prepare");
    }

    $stmt->bind_param("i", $idUsuario);
    $stmt->execute();
}

$idCarrito = "SELECT id FROM carritos_users WHERE id_usuario = $idUsuario";
$result = $conection->query($idCarrito);
$row = $result->fetch_assoc();
$id = $row['id'];

echo json_encode([
    "success" => true,
    "id" => $id
]);

$stmt->close();
$conection->close();