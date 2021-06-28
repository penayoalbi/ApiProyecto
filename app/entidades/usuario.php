<?php

class Usuario
{
    public $nombre;
    public $pass;

    public function __Construct()
    {
       
        $this->nombre="$_POST[txtUsuario]";
        $this->pass="$_POST[txtPass]";
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getPass(){
        return $this->pass;
    }
    public function setPass(){
        $this->pass=$pass;

    }
    public function setNombre(){
        $this->nombre=$nombre;
    }


    /*
    public function MostrarValor(){
        return $this->valor;
    }
    */
    public static function ListarUsuario()
    {
        $objAcceso = accesoDatos::obtenerInstancia();
        $consulta = $objAcceso->prepararConsulta("SELECT * FROM usuarios");
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_CLASS, 'usuarios');
    }

    public  function CrearUsuario($usuario)
    {
        $objAcceso = accesoDatos::obtenerInstancia();
        $consulta = $objAcceso->prepararConsulta("INSERT INTO usuarios VALUES (?,?)");
    
        $consulta->execute(array($usuario->getNombre(),$usuario->getPass()));

        return $consulta->fetchAll(PDO::FETCH_CLASS, 'usuarios');
    }

    public function RetornarUsuario(){
        $objAcceso = accesoDatos::obtenerInstancia();
        $consulta = $objAcceso->prepararConsulta("SELECT * FROM usuarios");
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_CLASS, 'usuarios');
    

    }

}
?>