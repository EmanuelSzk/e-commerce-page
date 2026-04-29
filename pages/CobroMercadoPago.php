<?php

require '../vendor/autoload.php';

require_once __DIR__ . '/../config.php';

use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;

MercadoPagoConfig::setAccessToken(MERCADOPAGO_ACCESS_TOKEN);

$Client = new PreferenceClient();
$preference = $Client->create([
    "notification_url" => "localhost/e-commerce-page/CRUD/notification.php",   
    "items" => array(
        array(
            "title" => "Producto",
            "quantity" => 1,
            "unit_price" => 101.0
        )
    ),
]);

$preference->back_urls = array(
    "success" => "localhost/e-commerce-page/CRUD/send_email.php",
    "failure" => "localhost/e-commerce-page/pages/comprar.php",
    "pending" => "localhost/e-commerce-page/pages/comprar.php"
);

// Redirige directamente al checkout de Mercado Pago
if (isset($preference->init_point)) {
    header("Location: " . $preference->init_point);
    exit();
}

?>