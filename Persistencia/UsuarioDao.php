<?php
include ("../Modelo/Usuario.php");

class UsuarioDao{

    /*Atributos de la clase para Empleado DAO(Data Access Object), datos necesarios para conectar la bd en mysql en el 
    servidor*/
    private $server = "localhost";
    private $usr = "root";
    private $pass = "";
    private $db = "tienda";

    //Método para conectar a la base de datos y poder hacer transacciones de todo tipo permitidas
    private function conectar(){
        try {
            $mysqli = new mysqli(
                $this->server,
                $this->usr,
                $this->pass,
                $this->db);
            return $mysqli;
        } catch (mysqli_sql_exception $e) {
            throw $e;
        }
    }

    //Método de consulta para un usuario en este caso
    public function consulta($csql){
        $conexion = $this->conectar();
        $resultado = $conexion->query($csql);
        return $resultado;
    }

    //Método de inserción de un usuario en este caso
    public function agrega(Usuario $usuario){
        $conexion = $this->conectar();
        $csql = "insert into usuario(idTipoUsuario, idDepartamento, email, contrasena, nombre, apellidos, genero, domicilio, rfc, puesto, salario)
        values ('".$usuario->getIdTipoUsuario()."', '".$usuario->getIdDepartamento()."', '".$usuario->getEmail()."', '".$usuario->getContrasena()."', '".$usuario->getNombre()."', '".$usuario->getApellidos()."', '".$usuario->getGenero()."', '".$usuario->getDomicilio()."', '".$usuario->getRfc()."', '".$usuario->getPuesto()."', '".$usuario->getSalario()."')";
        $resultado = $conexion->query($csql);
        return $resultado;
    }

    //Método de eliminación para un usuario en este caso
    public function elimina($esql){
        $conexion = $this->conectar();
        $resultado = $conexion->query($esql);
        return $resultado;
    }

    //Método de modificación de un usuario en este caso     ---->> ###***QUEDA PENDIENTE***###
    public function modifica(Empleado $empleado){
        $conexion = $this->conectar();
        $csql = "update empleado set nombre='".$empleado->getNombre()."',apellidos='".$empleado->getApellidos()."',sueldo='".$empleado->getSueldo()."' WHERE id = ".$empleado->getId();
        $resultado = $conexion->query($csql);
        return $resultado;
    }
}