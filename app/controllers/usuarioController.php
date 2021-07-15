<?php

class usuarioController{

public function CrearUsuario($request, $response, $args){
    $listaDeParametros = $request->getParsedBody();
   // if(isset($listaDeParametros)){
    $NuevoUser = new Usuario();
    $NuevoUser->setNombre($listaDeParametros['nombre']);
    $NuevoUser->setCorreo($listaDeParametros['correo']);
    $NuevoUser->setClave($listaDeParametros['clave']);
    $NuevoUser->NuevoUsuario();
    $response->getBody()->write( json_encode($NuevoUser));
    return $response;
   // }else{
   //     return $response->getBody()->write('lista sin parametros');
   // }
}

public function Login($request, $response, $args){
    $param = $request->getParsedBody();
    $rs= Usuario::RetornarUsuario($param['nombre']);
   // var_dump($param);
    $user=in_array($param['nombre'], array_column($rs,'nombre'));
    //$user = array_uintersect_assoc( $param,$rs,"strcasecmp");
    if($user){
        $response->getBody()->write("Bienvenido");
    }else{
        $response->getBody()->write("Usuario no registrado");
    } 
    //$response->getBody()->write(json_encode($param));
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
    //  $user=  Usuario::RetornarUsuario();
      $param = $request->getParsedBody();
      $rs = Usuario ::RetornarUsuario($param['nombre']);
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