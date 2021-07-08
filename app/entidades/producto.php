<?php

class Producto{
    public $idProd;
    public $nombre;
    //public $img;
    public $desc;
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

    public  function CrearProducto($nombre)
    {
        $objAcceso = accesoDatos::obtenerInstancia();
        $consulta = $objAcceso->prepararConsulta("INSERT INTO productos(idProducto,nombre,descripcion) VALUES (?,?,?)");
    
        $consulta->execute(array($producto->getNombre(),$producto->getPass()));

        return $consulta->fetchAll(PDO::FETCH_CLASS, 'productos');
    }
///*WHERE nombre LIKE ''$buscar%"*/
    public function ListarProducto($nombre){
        $objAcceso = accesoDatos::obtenerInstancia();
        $consulta = $objAcceso->prepararConsulta("SELECT * FROM productos");
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_CLASS, 'productos');
    

    }
    


}
 

?>