<?php

class usuarioController{

public function CrearUsuario($request, $response, $args){
    $listaDeParametros = $request->getParsedBody();
    $NuevoUser = new Usuario();
    $NuevoUser->setNombre($listaDeParametros['nombre']);
    $NuevoUser->setApellido($listaDeParametros['apellido']);
    $NuevoUser->setCorreo($listaDeParametros['correo']);
    $NuevoUser->setUsuario($listaDeParametros['usuario']);
    $NuevoUser->setClave($listaDeParametros['clave']);
    $NuevoUser->NuevoUsuario();
    $response->getBody()->write( json_encode($NuevoUser));
    return $response;
  
}

public function Login($request, $response, $args){
    $param = $request->getParsedBody();
   // var_dump($param);
    $rs= Usuario::RetornarUsuario($param['usuario']);
   // var_dump($rs);
    $user=in_array($param['usuario'], array_column($rs,'usuario'));
   // var_dump($param);
    if($user){
    $pass = in_array($param['clave'],array_column($rs,'clave'));
    if($pass){
        $response->getBody()->write("ok");
    }else{
        $response->getBody()->write("pass no valido");
    }
   }else{
    $response->getBody()->write("usuario no valido");
   }
    return $response;
}

public function BorrarUsuario($request, $response, $args){
    $aborrar = $request->getAttribute('id');
    //$aborrar = $args['id'];
    Usuario::BorrarUsuario($aborrar);
    $response->getBody()->write('se borro usuario con el id: '.$aborrar);
    return $response;
}

public  function ObtenerUsuario($request, $response, $args){
    $param = $request->getParsedBody();
    $rs = Usuario ::RetornarUsuario($param['usuario']);
    if($rs){ 
        $response->getBody()->write(json_encode($rs));
    }else{
        $response->getBody()->write("nou ");
    }
    return $response;
}

public function ModificarUsuario($request, $response,$args){
    return $response->getBody()->write("modificar usuario");
}

public function ListarUsuario($request, $response, $args){
    $param = $request->getParsedBody();
    $rs=Usuario::ListarUsuarios($param['nombre']);
    return $response->getBody()->write(json_encode($rs));
}

public function validarAcceso(){

}
public function LeerJSONPost($request, $response, $args){
    // parametro que llego por el ruteo
   /*
    $valor =  $args['nombre'];
   
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
    */

    /*$user= new Usuario();
    //no anda
    foreach($rs as $art => $valueAtr){
        $user->{$atr} = $valueAtr;
    } 
    */
    }

}
?>