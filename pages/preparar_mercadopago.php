<?php

session_start();

require '../vendor/autoload.php';

use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;

// Solo crear preferencia si es primera visita (POST del formulario)
if (empty($_POST['nombre'])) {
    // No hay datos del formulario, mostrar error o redirigir
    echo "<p>Error: No se recibieron datos del formulario. <a href='comprar.php'>Volver al carrito</a></p>";
    exit();
}

// Guardar datos del formulario en sesión
$_SESSION['compra_nombre'] = $_POST['nombre'];
$_SESSION['compra_direccion'] = $_POST['direccion'];
$_SESSION['compra_telefono'] = $_POST['telefono'];
$_SESSION['compra_email'] = $_POST['email'];
$_SESSION['compra_pago'] = $_POST['pago'];
$_SESSION['compra_id'] = $_POST['id'];

MercadoPagoConfig::setAccessToken("APP_USR-1083867964253761-031501-0dcc721f2f482021091c93f111710088-3268408474");

$client = new PreferenceClient();
$preference = $client->create([
    "items" => array(
        array(
            "title" => "Producto",
            "quantity" => 1,
            "unit_price" => 101.0
        )
    ),
    "back_urls" => array(
        "success" => "http://localhost/e-commerce-page/pages/preparar_mercadopago.php?status=approved",
        "failure" => "http://localhost/e-commerce-page/pages/comprar.php",
        "pending" => "http://localhost/e-commerce-page/pages/comprar.php"
    ),
    "auto_return" => "approved"
]);

// Guardar el ID de preferencia en sesión para usarlo en el frontend
$_SESSION['preference_id'] = $preference->id;
$_SESSION['init_point'] = $preference->init_point;

// Pasar los datos al template
$preferenceId = $preference->id;

?>

<!DOCTYPE html>
<html>

<head>
    <title>Procesando pago con Mercado Pago</title>
</head>

<body>

    <script src="https://sdk.mercadopago.com/js/v2"></script>

    <!-- Container para v botón de pagamento -->
    <div id="walletBrick_container"></div>

    <script>
        // Configure sua chave pública do Mercado Pago
        const publicKey = "APP_USR-97aece7c-27c6-4149-80c3-3caabc7a702e";
        // Configure o ID de preferência que você deve receber do seu backend
        const preferenceId = "<?php echo $preferenceId; ?>";

        // Inicializa o SDK do Mercado Pago
        const mp = new MercadoPago(publicKey);

        // Cria o botão de pagamento
        const bricksBuilder = mp.bricks();
        const renderWalletBrick = async (bricksBuilder) => {
            await bricksBuilder.create("wallet", "walletBrick_container", {
                initialization: {
                    preferenceId: "<?php echo $preferenceId; ?>",
                },
                onSubmit: async (formData) => {
                    // Pago realizado o usuario haciendo clic en "Volver al sitio"
                    console.log("Pago procesado, redirigiendo...");
                    // Redirigir a nuestro script con status=approved
                    window.location.href = "preparar_mercadopago.php?status=approved&preference_id=<?php echo $preferenceId; ?>";
                },
                onError: (error) => {
                    console.error("Error en pago:", error);
                    window.location.href = "comprar.php";
                }
            });
        };

        renderWalletBrick(bricksBuilder);

    </script>

</body>

</html>
