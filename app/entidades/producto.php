<?php

class Producto{
    public $nombre;
    public $descripcion;
    //public $img;
    public function __Construct(){
        
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    public function getNombre(){
        return $this->nonbre;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }

    public  function CrearProducto()
    {
        $objAcceso = accesoDatos::obtenerInstancia();
        $consulta = $objAcceso->prepararConsulta("INSERT INTO productos(nombre,descripcion) VALUES (?,?)");
        $consulta->execute(array($this->nombre,$this->descripcion));

        return $consulta->fetchAll(PDO::FETCH_CLASS, 'Producto');
    }

    public static function ListarProducto($nombre){ 
        $objAcceso = accesoDatos::obtenerInstancia();
        //$consulta = $objAcceso->prepararConsulta("SELECT * FROM `productos` WHERE nombre LIKE '%$nombre%'");
        $consulta = $objAcceso->prepararConsulta("SELECT * FROM `productos`");
        //$consulta->execute(array($nombre)); 
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_CLASS, 'Producto');
    }

    public static function Borrar($idproducto){ 
        $objAcceso = accesoDatos::obtenerInstancia();
        $consulta = $objAcceso->prepararConsulta("DELETE  FROM productos WHERE idproducto = ?");
        $consulta->execute(array($idproducto));
        //$consulta->execute();
        //return $consulta->fetchAll(PDO::FETCH_CLASS, 'Producto');
    }
}
 
?>