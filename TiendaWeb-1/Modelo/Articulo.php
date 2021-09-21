<?php
class Articulo {
    //--Atributos
    private $idArticulo;
    private $idCategoria;
    private $nombre;
    private $descripcion;
    private $marca;
    private $precio;
    private $unidad;
    private $existencias;
    private $imagen;


    //Métodos de mutación (SET's)
    public function setIdArticulo($idArticulo){
        $this->idArticulo = $idArticulo; 
    }

    public function setIdCategoria($idCategoria){
        $this->idCategoria = $idCategoria; 
    }

    public function setNombre($nombre){
        $this->nombre = $nombre; 
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion; 
    }

    public function setMarca($marca){
        $this->marca = $marca; 
    }

    public function setPrecio($precio){
        $this->precio = $precio; 
    }

    public function setUnidad($unidad){
        $this->unidad = $unidad; 
    }

    public function setExistencias($existencias){
        $this->existencias = $existencias;
    }

    public function setImagen($imagen){
        $this->imagen = $imagen;
    }

    //Métodos de acceso (GET's)
    public function getIdArticulo(){ 
        return $this->idArticulo; 
    }

    public function getIdCategoria(){
        return $this->idCategoria; 
    }

    public function getNombre(){
        return $this->nombre;  
    }

    public function getDescripcion(){
        return $this->descripcion; 
    }

    public function getMarca(){
        return $this->marca;  
    }

    public function getPrecio(){
        return $this->precio; 
    }

    public function getUnidad(){
        return $this->unidad; 
    }

    public function getExistencias(){
        return $this->existencias; 
    }

    public function getImagen(){
        return $this->imagen; 
    }


}