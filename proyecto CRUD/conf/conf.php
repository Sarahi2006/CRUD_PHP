<?php
class ConnectionBD {
    private $servidor;
    private $usuario;
    private $contraseña;
    private $db;
    public $conexion;

    public function __construct($servidor, $usuario, $contraseña, $db){
        $this->servidor = $servidor;
        $this->usuario = $usuario;
        $this->contraseña = $contraseña;
        $this->db = $db;
        $this->conexion = null;
    }

    public function conectar(){
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->contraseña, $this->db);
        if ($this->conexion->connect_error){
            die("Conexion a la base de datos mala ".$this->conexion->connect_error);
        }else{
            //echo "conexion a base de datos";
        }
    }

    public function desconectar(){
        if ($this->conexion === null){

        }else{
            $this->conexion->close();
            //echo "conexion a base de datos finalizada";
        }
    }
}

$conexion = new ConnectionBD('localhost','root','','concensionario');