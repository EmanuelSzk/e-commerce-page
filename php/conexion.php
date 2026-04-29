<?php 

require_once __DIR__ . '/../config.php';

// Hosting
//$serverName = 'sql103.infinityfree.com';
//$userName = 'root';
//$password = 'if0_40116669';
//$dbName = 'if0_40116669_ecommerce';

// Pruebas locales
$serverName = DB_HOST; 
// $serverName = 'localhost';
$userName = DB_USER;
$password = DB_PASSWORD;
$dbName = DB_NAME;

//crea la conexión con la base de datos
$conection = new mysqli($serverName, $userName, $password, $dbName);

// if ($conection -> connect_error) {
//     die("error en la conexión: $conection -> connect_error");
// } else {
//     echo "la conexión se realizó exitosamente";
// }

?>