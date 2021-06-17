<?php
echo "Hola mundo";
 function crearRegistro(){
    $nombre = $_POST['txtnombre'];
    $apellido = $_POST['txtapellido'];
    $correo = $_POST['txtcorreo'];
    $pass = $_POST['txtpass'];
    $repass = $_POST['txtrepass'];

    $arch = fopen('registro.txt','w');

    fwrite($arch,$nombre.";");
    fwrite($arch,$apellido.";" );
    fwrite($arch,$correo.";" );
    fwrite($arch,$pass.";" );
    fwrite($arch,$repass.";");
    fclose($arch);
}
//back
crearRegistro();

?>