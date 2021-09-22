<?php
class TipoUsuario {
    //--Atributos
    private $idTipoUsuario;
    private $descripcion;

    //Métodos de mutación (SET's)
    public function seTidTipoUsuario($idTipoUsuario){
        $this->idTipoUsuario = $idTipoUsuario; 
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion; 
    }

    //Métodos de acceso (GET's)
    public function getIdTipoUsuario(){ 
        return $this->idTipoUsuario; 
    }

    public function getDescripcion(){
        return $this->descripcion; 
    }


}