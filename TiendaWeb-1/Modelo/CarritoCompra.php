<?php
class Carrito {
    //--Atributos
    private $idCarritoCompra;
    private $idArticulo;
    private $cantidad;
    private $idUsuario;

    //Métodos de mutación (SET's)
    public function setIdCarritoCompra($idCarritoCompra){
        $this->idCarritoCompra = $idCarritoCompra; 
    }

    public function setIdArticulo($idArticulo){
        $this->idArticulo = $idArticulo; 
    }

    public function setCantidad($cantidad){
        $this->cantidad = $cantidad; 
    }

    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario; 
    }

    //Métodos de acceso (GET's)
    public function getIdCarritoCompra(){ 
        return $this->idCarritoCompra; 
    }

    public function getIdArticulo(){
        return $this->idArticulo; 
    }

    public function getCantidad(){
        return $this->cantidad;  
    }

    public function getIdUsuario(){
        return $this->idUsuario; 
    }


}