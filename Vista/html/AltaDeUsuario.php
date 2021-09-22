<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario agregado</title>
</head>

<body>
    <?php
    if($resultado){
        echo "Nuevo usuario registrado";
    } else {
        echo "Error no se pudo registrar: ".$resultado;
    }
?>
</body>

</html>