<?php
    $servidor="localhost";
    $nombreBD="tienda";
    $usuario="isaac";
    $pass="admin1234";
    $conexion = new mysqli($servidor,$usuario,$pass,$nombreBD);
    if($conexion -> connect_error){
        die("No se pudo conectar");
    }
?>