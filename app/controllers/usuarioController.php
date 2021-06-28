<?php

class UsuarioController{

public function RetornarUsuario($request, $response, $args){

    $user=  Usuario ::RetornarUsuario();
    $param1 = $request->getParseBody();
    $rs = in_array($param1['usuarioN'],array_column($user, 'nombre'));

    if($rs){
        $response->getBody()->write("OK");
    }else{
        $response->getBody()->write(" ");
    }
 
    $response->getBody()->Write(json_encode($user));

    return $response;
}

public function CrearUsuario($request, $response,$argc){

    return $response->getBody()->whrite("crear usuario");
}

public function ModificarUsuario($request, $response,$argc){
    return $response->getBody()->whrite("modificar usuario");
}

public function ListarUsuario($request, $response,$argc){
    return $response->getBody()->whrite("listar usuario");
}

/*public function validarAcceso(){

}*/

public function Login($request, $response,$argc){
    $response->getBody()->white("bienvenido hi");
    return $response;
 
}

public function LeerJSONPost($request, $response, $args){
    // parametro que llego por el ruteo
     $valor =  $args['param'];
   
    //$response->getBody()->Write($valor);
    //objeto enviado via FormData
     //$listaDeParametros = $request->getParsedBody();
     //$response->getBody()->Write($listaDeParametros['pass']);
    //El dato llega por el body como texto
  
    $ObjetoProvenienteDelFront =  json_decode($request->getBody());
    //var_dump($ObjetoProvenienteDelFront);

        //recorro los valores del objeto
       /* $MiUsuario = new Usuario();
        foreach ($ObjetoProvenienteDelFront as $atr => $valueAtr) {
            $MiUsuario->{$atr} = $valueAtr;
        }
    */

    $response->getBody()->Write(" hi ");

    return $response;
}

}
?>