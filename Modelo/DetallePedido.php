<?php
class DetallePedido {
    //--Atributos
    private $idDetallePedido;
    private $idPedido;
    private $idArticulo;
    private $idFormaPago;
    private $cantidad;

    //Métodos de mutación (SET's)
    public function setIdDetallePedido($idDetallePedido){
        $this->idDetallePedido = $idDetallePedido; 
    }

    public function setIdPedido($idPedido){
        $this->idPedido = $idPedido; 
    }

    public function setIdArticulo($idArticulo){
        $this->idArticulo = $idArticulo; 
    }

    public function setIdFormaPago($idFormaPago){
        $this->idFormaPago = $idFormaPago; 
    }

    public function setCantidad($cantidad){
        $this->cantidad = $cantidad; 
    }

    //Métodos de acceso (GET's)
    public function getIdDetallePedido(){
        return $this->idDetallePedido;  
    }
    
    public function getIdPedido(){ 
        return $this->idPedido; 
    }

    public function getIdArticulo(){
        return $this->idArticulo; 
    }

    public function getIdFormaPago(){ 
        return $this->idFormaPago; 
    }

    public function getCantidad(){
        return $this->cantidad;  
    }


}