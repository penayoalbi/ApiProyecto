<?php

class Usuario
{
    public $nombre;
    public $apellido;
    public $correo;
    public $usuario;
    public $clave;
    public $id;
    public $token;

    public function __Construct(){ }
    
    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function getClave(){
        return $this->clave;
    }
    
    public function getId(){
        return $this->id;    
    }

    public function getToken(){
        return $this ->$token;
    }

    //setter
    public function setNombre($nombre){
        $this -> nombre = $nombre;
    }

    public function setApellido($apellido){
        $this -> apellido = $apellido;
    }
    public function setCorreo($correo){
         $this->correo=$correo;
    }

    public function setUsuario($usuario){
        $this->usuario=$usuario;
    }

    public function setClave($clave){
        $this->clave=$clave;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function setToken($token){
        $this->token=$token;
    }
//generar token
   /* public function Token(){
        $this->token =  md5($this->id);
    }*/
    
    //crear usuario
    public static function  NuevoUsuario(Usuario $user){
        $objAcceso = accesoDatos::obtenerInstancia();
        $consulta = $objAcceso->prepararConsulta("INSERT INTO usuarios(nombre, apellido, correo, usuario, clave) VALUES (?,?,?,?,?)");
        $consulta->bindParam(1, $user->nombre);
        $consulta->bindParam(2, $user->apellido);
        $consulta->bindParam(3, $user->correo);
        $consulta->bindParam(4, $user->usuario);
        $consulta->bindParam(5, $user->clave);
        $consulta->execute();
        //$consulta->execute(array($this->nombre,$this->apellido,$this->correo,$this->usuario,$this->clave));

        return $consulta->fetchAll(PDO::FETCH_CLASS,'Usuario');
    }

    public static function RetornarUsuario(Usuario $user){//RetornarUsuario
        $objetoPDO = accesoDatos::obtenerInstancia();
        $consulta = $objetoPDO->prepararConsulta("SELECT id, nombre, apellido, usuario, clave FROM `usuarios` WHERE `usuario` = ? and `clave` = ?");
       // $consulta->execute(array($this->$usuario));
        $consulta->bindParam(1, $user->usuario);
        $consulta->bindParam(2, $user->clave);
        $consulta->execute();
       
        return $consulta->fetchAll(PDO::FETCH_CLASS,'Usuario');
    }
    
    public function ModificarUsuario(Usuario $id){
        $objAcceso = accesoDatos::obtenerInstancia();
        $consulta = $objAcceso->prepararConsulta("UPDATE `usuarios` 
        SET `nombre` = ?, `apellido` = ?, `correo` = ?, `usuario` = ?, `clave` = ? WHERE `usuarios`.`id` = $id");
        $consulta->execute(array($this->id,$this->nombre,$this->apellido,$this->correo,$this->usuario,$this->clave));
       // return $consulta->fetchAll(PDO::FETCH_CLASS, 'Usuario');
        return $consulta->fetchAll();
    }

    public static function BorrarUsuario($id){ 
        $objAcceso = accesoDatos::obtenerInstancia();
        $consulta = $objAcceso->prepararConsulta("DELETE  FROM usuarios WHERE id= ?");
        //$consulta->execute(array($this->nombre));
        $consulta->execute(array($id));
    }

    public static function traerUsuarios()
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