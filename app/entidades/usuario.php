<?php

class Usuario
{
    public $nombre;
    public $correo;
    public $pass;

    public function __Construct()
    {
        $this->nombre="$_POST[txtNombre]";
        $this->correo="$_POST[txtCorreo]";
        $this->pass="$_POST[txtPass]";
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getPass(){
        return $this->pass;
    }
    public function getCorreo(){
        return $this->correo;
    }
    public function setNombre($pass){
        $this->nombre=$nombre;
    }
    public function setCorreo($correo){
         $this->correo=$correo;
    }
    public function setPass($pass){
        $this->pass=$pass;
    }
   

    /*
    public function MostrarValor(){
        return $this->valor;
    }
    */
    public static function ListarUsuario($nombre)
    {
        $objAcceso = accesoDatos::obtenerInstancia();
        $consulta = $objAcceso->prepararConsulta("SELECT * FROM usuarios WHERE usuario = ? ");
        $consulta->execute($nombre);

        return $consulta->fetchAll(PDO::FETCH_CLASS, 'usuarios');
    }

    public  function CrearUsuario($NuevoUsuario)
    {
        $objAcceso = accesoDatos::obtenerInstancia();
        $consulta = $objAcceso->prepararConsulta("INSERT INTO usuarios VALUES (?,?,?)");
        $consulta->execute(array($usuario->nombre,$usuario->correo,$usuario->pass));
     //   $consulta->execute(array($usuario->getNombre(),$usuario->getCorreo(),$usuario->getPass()));

       // return $consulta->fetchAll(PDO::FETCH_CLASS, 'usuarios');
    }

    public static function RetornarUsuario($nombre){
        $base = accesoDatos::obtenerInstancia();
        $consulta = $base->prepararConsulta("SELECT * FROM usuarios WHERE nombre= '?'");
       // $consulta->execute(array($nombre));
       $consulta->execute($nombre);
       return $consulta->fetchAll(PDO::FETCH_CLASS, 'usuarios');
    }
}
?>