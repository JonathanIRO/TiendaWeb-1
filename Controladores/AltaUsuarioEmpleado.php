<?php
include ("../Persistencia/UsuarioDao.php");



//Recuperar datos del formulario
$idTipoUsuario = $_POST["tipoUsuario"];
$idDepartamento = $_POST["departamento"];
$email = $_POST["email"];
$contrasena = $_POST["contrasena"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$genero = $_POST["genero"];
$domicilio = $_POST["domicilio"];
$rfc = $_POST["rfc"];
$puesto = $_POST["puesto"];
$salario = $_POST["salario"];



//Revisavos si no se esta enviando un campo vacío
if ($nombre == "" || $apellidos == "" || $salario == "" || $idTipoUsuario == "" || $email == "" || $contrasena == "" || $genero == "" || $domicilio == "" || $rfc == "") {
    $resultado = "Error data empty";
} else {
    //Crear objeto usuario
    $usuarioNuevo = new Usuario();

    //Asignar valores de los atributos al nuevo empleado
    $usuarioNuevo->setIdTipoUsuario($idTipoUsuario);
    $usuarioNuevo->setIdDepartamento($idDepartamento);
    $usuarioNuevo->setEmail($email);
    $usuarioNuevo->setContrasena($contrasena);
    $usuarioNuevo->setNombre($nombre);
    $usuarioNuevo->setApellidos($apellidos);
    $usuarioNuevo->setGenero($genero);
    $usuarioNuevo->setDomicilio($domicilio);
    $usuarioNuevo->setRfc($rfc);
    $usuarioNuevo->setPuesto($puesto);
    $usuarioNuevo->setSalario($salario);



    //Consulta de la base de datos para la inserción de un nuevo empleado
    $usuariodao = new UsuarioDao();
    $resultado = $usuariodao->agrega($usuarioNuevo);
}


//Recorre el resultado en orden
//Despliega la vista con la información
require_once("../Vista/html/AltaDeUsuario.php");