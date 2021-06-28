<?php
include('accesoDatos.php');

$usuario=$_POST["txtUsuario"];
$pass=$_POST["txtPass"]; 

$conexion=mysqli_connect("localhost:3307","root","cr7carplove2911.","mitienda");
if (mysqli_connect_errno()) {
	echo "error al conectar a MYSQL";
	exit();
}

$rs= $conexion->query("CALL sp_in_login('".$usuario."','".$pass."', @f)");
$rs =$conexion->query('SELECT @f');
$row=mysqli_fetch_assoc($rs);

if($row['@f']!= null){
    echo "0";
}else{
    echo "1";
}



?>