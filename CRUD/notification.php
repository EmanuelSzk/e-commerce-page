<?php

use MercadoPago\MercadoPagoConfig;
use MercadoPago\client\Payment\PaymentClient;

MercadoPagoConfig::setAccessToken(MERCADOPAGO_ACCESS_TOKEN);
switch($_POST["type"]) {
    case "payment":
        $Client = new PaymentClient();
        $payment = $Client->get($_POST["data"]["id"]);
        echo "OK";
        break;
}

?>