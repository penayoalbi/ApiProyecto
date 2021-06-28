<?php
//echo "Hola mundo";
 function crearRegistro(){
    $nombre = $_POST['txtNombre'];
    $correo = $_POST['txtCorreo'];
    $pass = $_POST['txtPass'];
    


//back
crearRegistro();


/*archivos txt
    $arch = fopen('registro.txt','w');

    fwrite($arch,$nombre.";");
    fwrite($arch,$correo.";" );
    fwrite($arch,$pass.";" );
    fclose($arch);
    */
}

?>