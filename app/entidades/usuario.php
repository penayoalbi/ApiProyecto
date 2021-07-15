<?php

class Usuario
{
    public $nombre;
    public $correo;
    public $clave;

    public function __Construct()
    {/*
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
 
    //crear usuario
    public function NuevoUsuario(){
        $objAcceso = accesoDatos::obtenerInstancia();
        $consulta = $objAcceso->prepararConsulta("INSERT INTO usuarios(nombre, correo, clave) VALUES (?,?,?)");
        $consulta->execute(array($this->nombre,$this->correo,$this->clave));
    // return $consulta->fetchAll(PDO::FETCH_CLASS, 'Usuario');
        return $consulta->fetchAll();
    }

    public static function RetornarUsuario($nombre){
        $objetoPDO = accesoDatos::obtenerInstancia();
        $consulta = $objetoPDO->prepararConsulta("SELECT nombre FROM usuarios  WHERE nombre =?");
      //$consulta->execute();
        $consulta->execute(array($nombre));
        return $consulta->fetchAll(PDO::FETCH_CLASS,'Usuario');
    }

    public static function BorrarUsuario($id){ 
        $objAcceso = accesoDatos::obtenerInstancia();
        $consulta = $objAcceso->prepararConsulta("DELETE  FROM usuarios WHERE id= ?");
        //$consulta->execute(array($this->nombre));
        $consulta->execute(array($id));
    }

    public static function ListarUsuarios($nombre)
    {
        $objAcceso = accesoDatos::obtenerInstancia();
        $consulta = $objAcceso->prepararConsulta("SELECT * FROM usuarios");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_CLASS, 'Usuario');
    }

       /*
    public function MostrarValor(){
        return $this->valor;
    }
    */

}

?>