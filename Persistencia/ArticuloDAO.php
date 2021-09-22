<?php
include ("../Modelo/Articulo.php");

class ArticuloDao{
    private $server="localhost";
    private $usr="root";
    private $pass="";
    private $db="tienda";
    
    public function conectar(){
        try{
            $mysqli = new mysqli($this->server,
                                $this->usr,
                                $this->pass,
                                $this->db);
            return $mysqli;
        } catch (mysqli_sql_exception $e) {
            throw $e;
        } 
    }

    public function agregaArticulo(Articulo $articulo){
        $conexion = $this->conectar();
        $alta = "insert into articulo (idCategoria, Nombre, Descripcion, 
        Marca, Precio, Unidad, Existencias, Imagen) values ("
        .$articulo->getIdCategoria().",'".$articulo->getNombre()."','".$articulo->getDescripcion().
        "','".$articulo->getMarca()."',".$articulo->getPrecio().",'".$articulo->getUnidad()."',"
        .$articulo->getExistencias().",'".$articulo->getImagen()."')";
        $resultado = $conexion->query($alta);
        return $resultado;
    }
}