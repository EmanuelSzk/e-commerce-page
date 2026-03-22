<?php

require '../vendor/autoload.php';

use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;

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