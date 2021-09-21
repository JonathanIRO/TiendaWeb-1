<?php
class Pedido {
    //--Atributos
    private $idPedido;
    private $idUsuario;
    private $idDetallePedido;
    private $fechaPedido;
    private $estatus;
    //private $domicilio;
    

    //Métodos de mutación (SET's)
    public function setIdPedido($idPedido){
        $this->idPedido = $idPedido; 
    }

    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario; 
    }

    public function setIdDetallePedido($idDetallePedido){
        $this->idDetallePedido = $idDetallePedido; 
    }

    public function setFechaPedido($fechaPedido){
        $this->fechaPedido = $fechaPedido; 
    }

    public function setEstatus($estatus){
        $this->estatus = $estatus; 
    }
/*
    public function setDomicilio($domicilio){
        $this->domicilio = $domicilio; 
    }*/

    //Métodos de acceso (GET's)
    public function getIdPedido(){ 
        return $this->idPedido; 
    }

    public function getIdUsuario(){
        return $this->idUsuario; 
    }

    public function getIdDetallePedido(){
        return $this->idDetallePedido;  
    }

    public function getFechaPedido(){
        return $this->fechaPedido; 
    }

    public function getEstatus(){
        return $this->estatus;  
    }
/*
    public function getDomicilio(){
        return $this->domicilio;  
    }*/


}