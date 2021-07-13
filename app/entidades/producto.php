<?php

class Producto{
    public $nombre;
    public $desc;
    //public $img;
    public function __Construct(){
        
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setDesc(){
        $this->desc = $desc;
    }
    public function getNombre(){
        return $this->nonbre;
    }
    public function getDesc(){
        return $this->desc;
    }

    public  function CrearProducto()
    {
        $objAcceso = accesoDatos::obtenerInstancia();
        $consulta = $objAcceso->prepararConsulta("INSERT INTO productos(nombre,descripcion) VALUES (?,?)");
        $consulta->execute(array($this->nombre,$this->desc));

        return $consulta->fetchAll(PDO::FETCH_CLASS, 'Producto');
    }

///*WHERE nombre LIKE ''$buscar%"*/
    public function ListarProducto($nombre){
        $objAcceso = accesoDatos::obtenerInstancia();
        $consulta = $objAcceso->prepararConsulta("SELECT * FROM productos");
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_CLASS, 'Producto');

    }
    
}
 

?>