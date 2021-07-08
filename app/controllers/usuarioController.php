<?php

class usuarioController{

public  function ObtenerUsuario($request, $response, $args){

   // $user=  Usuario::RetornarUsuario();
   // $user->nombre= "al";
   // $user->correo = "al@mail.com";
   // $user->pass= "pass";

    $param1 = $request->getParsedBody();
    $rs = Usuario ::RetornarUsuario($param1["nombre"]);
   // $rs = in_array($param1['idUsuario'],$param2['id'],array_column('nombre'));

    if($rs){
        $response->getParseBody()->write("retornar");
    }else{
        $response->getBody()->write("nou ");
    }

   //$response->getBody()->Write(json_encode($user));
 $response->getBody()->Write("obtener usuario");
    return $response;
}

public function CrearUsuario($request, $response, $args){
    $listaDeParametros= $request->getParsedBody();
    $nombre =$listaDeParametros['txtNombre'];
    $correo = $listaDeParametros['txtCorreo'];
    $pass = $listaDeParametros['txtPass'];
    
    $NuevoUsuario = new Usuario();
    
    $NuevoUsuario->setNombre($nombre);
    $NuevoUsuario->setCorreo($correo);
    $NuevoUsuario->setPass($$pass);

    return $response->getBody()->whrite(json_encode($NuevoUsuario));

}

public function ModificarUsuario($request, $response,$args){

    return $response->getBody()->whrite("modificar usuario");
}

public function ListarUsuario($request, $response,$args){
    return $response->getBody()->whrite("listar usuario");
}

/*public function validarAcceso(){

}*/

public function Login($request, $response,$args){
  //  $valor = $args['nombre'];
    $response->getBody()->white("Bienvenido a login");
    return $response;
}

public function LeerJSONPost($request, $response, $args){
    // parametro que llego por el ruteo
     $valor =  $args['param'];
   
    $response->getBody()->Write($valor);
    //objeto enviado via FormData
     $listaDeParametros = $request->getParsedBody();
     $response->getBody()->Write($listaDeParametros);
    //El dato llega por el body como texto
  
    $ObjetoProvenienteDelFront =  json_decode($request->getBody());
    var_dump($ObjetoProvenienteDelFront);

        //recorro los valores del objeto
        $MiUsuario = new Usuario();
        foreach ($ObjetoProvenienteDelFront as $atr => $valueAtr) {
            $MiUsuario->{$atr} = $valueAtr;
        }

    $response->getBody()->Write(" hi ");

    return $response;
}

}
?>