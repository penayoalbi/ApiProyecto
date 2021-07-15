<?php
//include('conexion.php');
/*
$usuario="root";
$pass=".";

$con="mysql:host=127.0.0.1;dbname=mitienda";
//session_start();


$conx =new PDO($con,$usuario,$pass);
try{
  //  $consulta= $conx->prepare("SELECT * FROM usuarios WHERE usuario=:parametri1 AND clave=(SELECT clave FROM usuarios WHERE clave=:parametro2)");
  $consulta= $conx->prepare("SELECT * FROM usuarios");
  // $consulta->bindValue(":parametro1",$this->usuario);
   // $consulta->bindValue(":parametro2",$this->pass);
    $consulta->execute();
    $fila=$consulta->fetch();
    echo "se conecto a la base";
    return $fila;
}catch(PDOException $e){
    print "Error ".$e->getMessage();
}

$resultado=mysqli_query($con,$consulta);

$filas=mysqli_num_rows($resultado);

if($fila){
    echo "exito";
    header("location:principal.html");
}else{
   // include('/../proyectoEdi/login.html');
   echo" <h1> ERROR: no se admite acceso</h1>";
}
//mysqli_free_result($resultado);
//mysqli_close();
*/

?>