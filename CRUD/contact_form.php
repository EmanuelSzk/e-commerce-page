<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
require_once '../config.php';

// Verificar que se recibieron los datos por POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

// Obtener y limpiar datos del formulario
$nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$asunto = isset($_POST['asunto']) ? trim($_POST['asunto']) : '';
$mensaje = isset($_POST['mensaje']) ? trim($_POST['mensaje']) : '';

// Validar datos requeridos
if (empty($nombre) || empty($email) || empty($asunto) || empty($mensaje)) {
    $_SESSION['contact_error'] = 'Todos los campos son obligatorios';
    header('Location: ../index.php#Contact');
    exit;
}

// Validar email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['contact_error'] = 'Email inválido';
    header('Location: ../index.php#Contact');
    exit;
}

// Crear instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host       = SMTP_HOST;
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USER;
    $mail->Password   = SMTP_PASSWORD;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = SMTP_PORT;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    // Destinatarios
    $mail->setFrom($email, $nombre);
    $mail->addAddress('szkabrij.emanuel@gmail.com');
    $mail->addReplyTo($email, $nombre);

    // Contenido del email
    $mail->isHTML(true);
    $mail->Subject = "Contacto: $asunto";

    $body = "<h2>Nuevo mensaje de contacto</h2>";
    $body .= "<table border='0' cellpadding='8' cellspacing='0'>";
    $body .= "<tr><td><strong>Nombre:</strong></td><td>$nombre</td></tr>";
    $body .= "<tr><td><strong>Email:</strong></td><td>$email</td></tr>";
    $body .= "<tr><td><strong>Asunto:</strong></td><td>$asunto</td></tr>";
    $body .= "<tr><td><strong>Mensaje:</strong></td><td>$mensaje</td></tr>";
    $body .= "</table>";

    $mail->Body = $body;
    $mail->AltBody = "Nuevo mensaje de contacto\n\nNombre: $nombre\nEmail: $email\nAsunto: $asunto\n\nMensaje:\n$mensaje";

    $mail->send();

    $_SESSION['contact_success'] = 'Mensaje enviado correctamente';
} catch (Exception $e) {
    $_SESSION['contact_error'] = "Error al enviar: {$mail->ErrorInfo}";
}

header('Location: ../index.php#Contact');
exit;
?>
