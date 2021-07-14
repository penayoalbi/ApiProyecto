<?php

class usuarioController{

public  function ObtenerUsuario($request, $response, $args){
    $user=  Usuario::RetornarUsuario();
    $param = $request->getParsedBody();
    $rs = Usuario ::RetornarUsuario($param['nombre']);
  
   foreach($rs as $atr =>$valueAtr){
    $user-> {$atr} = $valueAtr;
   }
    if($rs){ 
      return  $response->getBody()->write(json_encode($rs));
   }else{
        $response->getBody()->write("nou ");
    }
    return $response;
}

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

public function ModificarUsuario($request, $response,$args){
    return $response->getBody()->write("modificar usuario");
}

public function ListarUsuario($request, $response,$args){
    return $response->getBody()->write("listar usuario");
}

/*public function validarAcceso(){

}*/

public function Login($request, $response, $args){
  // $valor = $args['nombre'];
    $param = $request->getParsedBody();
   // var_dump($param);
    $rs= Usuario::RetornarUsuario($param['nombre']);
    $login= new Usuario();
//no anda
    if(count($rs)==1){
        foreach($rs as $item){
            foreach( $item as $art => $valueAtr){
                $login->{$atr} = $valueAtr;
            } 
        }
        if($login->$param['nombre']){
            $response->getBody()->Write("Bienvenido");
        }else{
            $response->getBody()->Write("No se encontraron coincidencia");
        }
    }else{
        $response->getBody()->Write("Usuario incorrecto");
    }
  // return $response->getBody()->write(json_encode($rs));
    return $response;
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
}

}
?>