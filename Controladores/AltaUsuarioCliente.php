<?php
include ("../Persistencia/UsuarioDao.php");



//Recuperar datos del formulario
$email = $_POST["email"];
$contrasena = $_POST["contrasena"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$genero = $_POST["genero"];
$domicilio = $_POST["domicilio"];
$rfc = $_POST["rfc"];




//Revisavos si no se esta enviando un campo vacío
if ($nombre == "" || $apellidos == "" || $email == "" || $contrasena == "" || $genero == "" || $domicilio == "" || $rfc == "") {
    $resultado = "Error data empty";
} else {
    //Crear objeto usuario
    $usuarioNuevo = new Usuario();

    //Asignar valores de los atributos al nuevo empleado
    $usuarioNuevo->setIdTipoUsuario(1);
    $usuarioNuevo->setIdDepartamento(4);
    $usuarioNuevo->setEmail($email);
    $usuarioNuevo->setContrasena($contrasena);
    $usuarioNuevo->setNombre($nombre);
    $usuarioNuevo->setApellidos($apellidos);
    $usuarioNuevo->setGenero($genero);
    $usuarioNuevo->setDomicilio($domicilio);
    $usuarioNuevo->setRfc($rfc);
    $usuarioNuevo->setPuesto(null);
    $usuarioNuevo->setSalario(0);



    //Consulta de la base de datos para la inserción de un nuevo empleado
    $usuariodao = new UsuarioDao();
    $resultado = $usuariodao->agrega($usuarioNuevo);
}


//Recorre el resultado en orden
//Despliega la vista con la información
require_once("../Vista/html/AltaDeUsuario.php");