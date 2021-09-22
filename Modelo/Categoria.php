<?php
class Categoria {
    //--Atributos
    private $idCategoria;
    private $nombre;
    private $descripcion;

    //Métodos de mutación (SET's)
    public function setIdCategoria($idCategoria){
        $this->idCategoria = $idCategoria; 
    }

    public function setNombre($nombre){
        $this->nombre = $nombre; 
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion; 
    }

    //Métodos de acceso (GET's)
    public function getIdCategoria(){ 
        return $this->idCategoria; 
    }

    public function getNombre(){
        return $this->nombre;  
    }

    public function getDescripcion(){
        return $this->descripcion; 
    }


}