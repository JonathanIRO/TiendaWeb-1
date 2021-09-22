<?php
class FormaPago {
    //--Atributos
    private $idFormaPago;
    private $idUsuario;
    private $nombre;
    private $nCuenta;
    private $opcionPago;
    private $fechaVencimiento;
    private $CCV;
    

    //Métodos de mutación (SET's)
    public function setIdFormaPago($idFormaPago){
        $this->idFormaPago = $idFormaPago; 
    }

    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario; 
    }

    public function setNombre($nombre){
        $this->nombre = $nombre; 
    }

    public function setCCV($CCV){
        $this->CCV = $CCV; 
    }

    public function setNCuenta($nCuenta){
        $this->nCuenta = $nCuenta; 
    }

    public function setOpcionPago($opcionPago){
        $this->opcionPago = $opcionPago; 
    }

    public function setFechaVencimiento($fechaVencimiento){
        $this->fechaVencimiento = $fechaVencimiento; 
    }

    //Métodos de acceso (GET's)
    public function getIdFormaPago(){ 
        return $this->idFormaPago; 
    }

    public function getIdUsuario(){ 
        return $this->idUsuario; 
    }

    public function getNombre(){
        return $this->nombre;  
    }

    public function getCCV(){
        return $this->CCV; 
    }

    public function getNCuenta(){
        return $this->nCuenta;  
    }

    public function getOpcionPago(){
        return $this->opcionPago; 
    }

    public function getFechaVencimiento(){
        return $this->fechaVencimiento;  
    }


}