<?php
// config.php - Archivo de configuración central
// Carga todas las variables de .env

require __DIR__ . '/vendor/autoload.php';

// Importar Dotenv
use Dotenv\Dotenv;

// Cargar variables de entorno
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Si existe .env.local, sus valores sobrescriben a .env
if (file_exists(__DIR__ . '/.env.local')) {
    $dotenv->safeLoad('.env.local');
}

// Definir constantes globales para usarlas en toda la app
define('APP_NAME', $_ENV['APP_NAME']);
define('APP_ENV', $_ENV['APP_ENVIRONMENT']);

define('DB_HOST', $_ENV['DB_HOST']);
define('DB_PORT', $_ENV['DB_PORT']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
define('DB_NAME', $_ENV['DB_NAME']);

define('SMTP_HOST', $_ENV['SMTP_HOST']);
define('SMTP_PORT', $_ENV['SMTP_PORT']);
define('SMTP_ENCRYPTION', $_ENV['SMTP_ENCRYPTION']);
define('SMTP_USER', $_ENV['SMTP_USER']);
define('SMTP_PASSWORD', $_ENV['SMTP_PASSWORD']);

define('MERCADOPAGO_MODE', $_ENV['MERCADOPAGO_MODE']);
define('MERCADOPAGO_ACCESS_TOKEN', $_ENV['MERCADOPAGO_ACCESS_TOKEN']);
define('MERCADOPAGO_PUBLIC_KEY', $_ENV['MERCADOPAGO_PUBLIC_KEY']);