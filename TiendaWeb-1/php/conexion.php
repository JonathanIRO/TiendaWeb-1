<?php
    $servidor="localhost";
    $nombreBD="sto";
    $usuario="isaac";
    $pass="";
    $conexion = new mysqli($servidor,$usuario,$pass,$nombreBD);
    if($conexion -> connect_error){
        die("No se pudo conectar");
    }
?>