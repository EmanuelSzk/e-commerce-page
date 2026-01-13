<?php

session_start();

include '../php/conexion.php';

if ($conection->connect_error) {
    die("error en la conexión con la base de datos");
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT id, nombre, password FROM usuarios WHERE email = ?";
$stmt = $conection->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $usuario = $result->fetch_assoc();

    if (password_verify($password, $usuario['password'])) {
        $_SESSION['user_id'] = $usuario['id'];
        $_SESSION['user_name'] = $usuario['nombre'];
        echo json_encode(["success" => true]);
        exit;
    } else {
        echo json_encode(["success" => false, "message" => "Email o contraseña incorrectos"]);
    }
}
