<?php
class Categoria {
    //--Atributos
    private $idDepartamento;
    private $nombre;
    private $descripcion;

    //Métodos de mutación (SET's)
    public function setIdDepartamento($idDepartamento){
        $this->idDepartamento = $idDepartamento; 
    }

    public function setNombre($nombre){
        $this->nombre = $nombre; 
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion; 
    }

    //Métodos de acceso (GET's)
    public function getIdDepartamento(){ 
        return $this->idDepartamento; 
    }

    public function getNombre(){
        return $this->nombre;  
    }

    public function getDescripcion(){
        return $this->descripcion; 
    }


}