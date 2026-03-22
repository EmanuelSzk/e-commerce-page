<?php

session_start();

include '../php/conexion.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

// Obtener datos de sesión (si viene de Mercado Pago) o de POST (si viene de efectivo)
$id = isset($_SESSION['compra_id']) ? $_SESSION['compra_id'] : $_POST['id'];
$nombre = isset($_SESSION['compra_nombre']) ? $_SESSION['compra_nombre'] : $_POST['nombre'];
$direccion = isset($_SESSION['compra_direccion']) ? $_SESSION['compra_direccion'] : $_POST['direccion'];
$telefono = isset($_SESSION['compra_telefono']) ? $_SESSION['compra_telefono'] : $_POST['telefono'];
$email = isset($_SESSION['compra_email']) ? $_SESSION['compra_email'] : $_POST['email'];
$pago = isset($_SESSION['compra_pago']) ? $_SESSION['compra_pago'] : $_POST['pago'];

$sql = "SELECT p.id, p.nombre, p.precio, p.imgURL, c.cantidad, cu.id_usuario FROM carrito c JOIN productos p ON c.id_product = p.id JOIN carritos_users cu ON c.id_Carrito = cu.id WHERE cu.id_usuario = (?)";
$stmt = $conection->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

$items = [];

while ($row = $result->fetch_assoc()) {
    $items[] = $row;
}

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {

    //Server settings $mail->"algo" accede a alguna propiedad del objeto $mail
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'szkabrij.emanuel@gmail.com';                     //SMTP username
    $mail->Password   = 'porl utwl oqza gkek';                               //SMTP password (1) Activar verificación en dos pasos (en tu cuenta de Google) (2) Crear una contraseña de aplicación Tipo: Mail Dispositivo: Otro / PHP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->SMTPOptions = array(                         // solución a: SMTP Error: Could not connect to SMTP host.
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    //Recipients
    $mail->setFrom('szkabrij.emanuel@gmail.com');
    $mail->addAddress('emaszk2@gmail.com');
    // $mail->addAddress('joe@example.net', 'Joe User'); (Add a recipient - Name is optional).
    // $mail->addReplyTo('info@example.com', 'Information'); (Si el usuario responde, a que gmail llega la respuesta).
    // $mail->addCC('cc@example.com'); Agrega un destinatario en CC (Con Copia). Todos ven que ese mail recibió copia.
    // $mail->addBCC('bcc@example.com'); Agrega un destinatario en BCC (Con Copia Oculta). Nadie ve que este destinatario recibió el mail

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         Add attachments taken from the server not from te PC (La ruta es del servidor donde corre PHP)
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    Optional name



    //Content
    $mail->isHTML(true);                                                            //Set email format to HTML
    $mail->Subject = 'Pedido de compra';

    $body = "<h2>Detalle de la compra</h2>";
    $body .= "<p><strong>Nombre:</strong> $nombre</p>";
    $body .= "<p><strong>Dirección:</strong> $direccion</p>";
    $body .= "<p><strong>Teléfono:</strong> $telefono</p>";
    $body .= "<p><strong>Email:</strong> $email</p>";
    $body .= "<p><strong>Método de pago:</strong> $pago</p>";

    $body .= "<hr>";

    $body .= "<table border='1' cellpadding='8' cellspacing='0'>";
    $body .= "<tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            </tr>";

    $total = 0;

    foreach ($items as $item) {
        $subtotal = $item['precio'] * $item['cantidad'];
        $total += $subtotal;

        $body .= "<tr>
                <td>{$item['nombre']}</td>
                <td>$ {$item['precio']}</td>
                <td>{$item['cantidad']}</td>
                <td>$ $subtotal</td>
                </tr>";
    }

    $body .= "</table>";
    $body .= "<h3>Total: $ $total</h3>";

    $mail->Body = $body;

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';    //This is the body in plain text for non-HTML mail clients

    $mail->send();

    $query = "DELETE c FROM carrito c join carritos_users cu on c.id_carrito = cu.id where cu.id_usuario = (?)";
    $stmt = $conection->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Limpiar variables de sesión de la compra
    unset($_SESSION['compra_id']);
    unset($_SESSION['compra_nombre']);
    unset($_SESSION['compra_direccion']);
    unset($_SESSION['compra_telefono']);
    unset($_SESSION['compra_email']);
    unset($_SESSION['compra_pago']);
    unset($_SESSION['preference_id']);
    unset($_SESSION['init_point']);

    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

    header("location: ../index.php");

?>