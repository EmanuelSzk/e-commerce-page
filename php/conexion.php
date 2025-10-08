<?php 

$serverName = 'localhost';
$userName = 'root';
// $password = '110402BeS44150784';
$password = '';
$dbName = 'ecommerce';

//crea la conexión con la base de datos
$conection = new mysqli($serverName, $userName, $password, $dbName);

if ($conection -> connect_error) {
    die("error en la conexión: $conection -> connect_error");
} else {
    echo "la conexión se realizó exitosamente";
}

?>