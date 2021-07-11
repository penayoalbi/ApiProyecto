<?php

class Usuario
{
    public $nombre;
    public $correo;
    public $clave;

    public function __Construct()
    {/*
        $this->nombre=getParam('nombre');
        $this->correo=getParam('correo');
        $this->clave=getParam('clave');
        
        $this->nombre="$_POST[nombre]";
        $this->correo="$_POST[correo]";
        $this->clave="$_POST[clave]";
       */
    }
  

    public function getNombre(){
        return $this->nombre;
    }
    public function getClave(){
        return $this->clave;
    }
    public function getCorreo(){
        return $this->correo;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setCorreo($correo){
         $this->correo=$correo;
    }
    public function setClave($clave){
        $this->clave=$clave;
    }
   
    /*
    public function MostrarValor(){
        return $this->valor;
    }
    */
    public static function ListarUsuario($nombre)
    {
        $objAcceso = accesoDatos::obtenerInstancia();
        $consulta = $objAcceso->prepararConsulta("SELECT * FROM usuarios");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_CLASS, 'Usuario');
    }

    public function NuevoUsuario(){//crear nuevos usuarios
        $objAcceso = accesoDatos::obtenerInstancia();
        $consulta = $objAcceso->prepararConsulta("INSERT INTO usuarios(nombre, correo, clave) VALUES (?,?,?)");
        $consulta->execute(array($this->nombre,$this->correo,$this->clave));
    // return $consulta->fetchAll(PDO::FETCH_CLASS, 'Usuario');
        return $consulta->fetchAll();
    }

    public function RetornarUsuario($nombre){
        $objetoPDO = accesoDatos::obtenerInstancia();
        $consulta = $objetoPDO->prepararConsulta("SELECT nombre FROM usuarios WHERE = ?");
        $consulta->execute();
       return $consulta->fetchAll(PDO::FETCH_CLASS,'Usuario');
    }
}
?>