<?php
include ("../Persistencia/ArticuloDao.php");


//Recuperar datos del formulario
//$idArticulo = $_POST["idArticulo"];
$idCategoria = $_POST["idCategoria"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$marca = $_POST["marca"];
$precio = $_POST["precio"];
$unidad = $_POST["unidad"];
$existencias = $_POST["existencias"]; 
$image = $_FILES['imagen']['tmp_name'];
$imagen = addslashes (file_get_contents($image));

//Revisavos si no se esta enviando un campo vacío
if ($idCategoria == "" || $nombre == "" || $descripcion == "" || $marca == "" || $precio == "" || $unidad == "" || $existencias == "") {
    $resultado = "Error data empty";
} else {
    //Crear objeto articulo
    $articuloNuevo = new Articulo();
    
    //Asignar valores de los atributos al nuevo articulo
    $articuloNuevo->setIdArticulo(0);
    $articuloNuevo->setIdCategoria($idCategoria);
    $articuloNuevo->setNombre($nombre);
    $articuloNuevo->setDescripcion($descripcion);
    $articuloNuevo->setMarca($marca);
    $articuloNuevo->setPrecio($precio);
    $articuloNuevo->setUnidad($unidad);
    $articuloNuevo->setExistencias($existencias);
    $articuloNuevo->setImagen($imagen);


    //Consulta de la base de datos para la inserción de un nuevo articulo
    $articulodao = new ArticuloDao();
    $resultado = $articulodao->agregaArticulo($articuloNuevo);
}


//Recorre el resultado en orden
//Despliega la vista con la información
require_once("../Vista/html/AltaDeArticulo.php");


