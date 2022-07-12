<?php

class Lugar {
    public $id;
    public $titulo;
    public $imagen;
    public $comentario;

    public function __Construct(){}

    public function setId($id){
        $this-> id = $id;
    }
   
    public function setTitulo($titulo){
        $this -> titulo = $titulo;
    }

    public function setImagen($imagen){
        $this -> imagen= $imagen;
    }

    public function setComentario($comentario){
        $this -> comentario = $comentario;
    }

    public function getId(){
        return $this -> id;
    }

    public function getTitulo(){
        return $this->titulo;
    }
    public function getImagen(){
        return $this->imagen;
    }

    public function getComentario(){
        return $this->comentario;
    }

    public static function setLugar(Lugar $lugar){
        $objAcceso = accesoDatos::obtenerInstancia();
        $consulta = $objAcceso ->prepararConsulta("INSERT INTO lugares (titulo,imagen)VALUES (?,?)");
        $consulta->binParam(1, $lugar->titulo);
        $consulta->binParam(2, $lugar->imagen);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_CLASS, 'Lugar');
    } 

    public static function getLugar(){
        $objAcceso = accesoDatos::obtenerInstancia();
        $consulta = $objAcceso -> prepararConsulta("SELECT * FROM lugares");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_CLASS, 'Lugar');
    }

}

?>