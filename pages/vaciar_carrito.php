<?php 

include '../php/conexion.php';

$sql = "TRUNCATE TABLE carrito";

if ($conection->query($sql)) {
    echo "Tabla borrada con exito";
} else {
    echo "ocurrió un error inesperado" . $conection->error;
}

?>