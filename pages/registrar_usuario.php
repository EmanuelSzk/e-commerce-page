<?php
include '../php/conexion.php';

if ($conection->connect_error) {
    die("Error en la conexión");
}

// 1️⃣ Recibir datos
$firstName = $_POST['first-name'] ?? '';
$lastName  = $_POST['last-name'] ?? '';
$email     = $_POST['email'] ?? '';
$password  = $_POST['password'] ?? '';

// 2️⃣ Hashear contraseña
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// 3️⃣ Preparar SQL
$sql = "INSERT INTO usuarios (nombre, apellido, email, password)
        VALUES (?, ?, ?, ?)";

$stmt = $conection->prepare($sql);

if (!$stmt) {
    die("Error en prepare");
}

// 4️⃣ Bind de parámetros
$stmt->bind_param("ssss", $firstName, $lastName, $email, $passwordHash);

// 5️⃣ Ejecutar
if ($stmt->execute()) {
    echo "Usuario registrado correctamente";
} else {
    echo "Error al registrar usuario";
}

$stmt->close();
$conection->close();