<?php

class Producto{
    public $id;
    public $nombre;
    public $descripcion;
    public $categoria;
    public $precio;
    public $stock; 
    public $imagen;

    //public $img;
    public function __Construct(){
        
    }

    public function setImagen(){
        $this->imagen= $imagen;
    }
    public function getImagen(){
        return $this->imagen;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }

    public function setPrecio($precio){
        $this->precio = $precio;
    }
    public function setStock($stock){
        $this->stock = $stock;
    }
    public function setId($id){
        $this->precio = $precio;
    }

    public function getNombre(){
        return $this->nonbre;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getCategoria(){
        return $this->categoria;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function getStock(){
        return $this->stock;
    }

    public static function CrearProducto(Producto $prod)
    {
        $objAcceso = accesoDatos::obtenerInstancia();
        $consulta = $objAcceso->prepararConsulta("INSERT INTO productos(nombre,descripcion,categoria,precio,stock,imagen) VALUES (?,?,?,?,?,?)");
        $consulta->bindParam(1, $prod->nombre);
        $consulta->bindParam(2, $prod->descripcion);
        $consulta->bindParam(3, $prod->categoria);
        $consulta->bindParam(4, $prod->precio);
        $consulta->bindParam(5, $prod->stock);
        $consulta->bindParam(6, $prod->imagen);
        $consulta->execute();
      //  $consulta->execute(array($this->nombre,$this->descripcion));

        return $consulta->fetchAll(PDO::FETCH_CLASS, 'Producto');
    }

    public static function ListarProducto(){ 
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

    public static function Buscar($nombre){ 
        //SELECT * FROM `productos` WHERE nombre LIKE '%?'
        $objAcceso = accesoDatos::obtenerInstancia();
        $consulta = $objAcceso->prepararConsulta("SELECT * FROM productos WHERE nombre LIKE %?");
        $consulta->execute(array($nombre));
        //$consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_CLASS, 'Producto');
    }

    public static function editar($id, Producto $prod){
        $objAcceso = accesoDatos::obtenerInstancia();
        $consulta = $objAcceso->prepararConsulta("UPDATE productos SET nombre = ?, descripcion = ?, categoria = ?, precio = ?,  stock = ?  WHERE idproducto = ?");
        
        $consulta->bindParam(1, $prod->nombre);
        $consulta->bindParam(2, $prod->descripcion);
        $consulta->bindParam(3, $prod->categoria);
        $consulta->bindParam(4, $prod->precio);
        $consulta->bindParam(5, $prod->stock);
        $consulta->execute($this->id);
        //$consulta->execute(array($this->nombre,$this->descripcion));

        return $consulta->fetchAll(PDO::FETCH_CLASS, 'Producto');

    }
}
 
?>