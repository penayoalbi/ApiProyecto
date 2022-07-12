<?php
 class LugarController {

    public function ListarLugar($request, $response, $args){
        $objectFront = $request->getParsedBody();
        $resul = new Lugar();
        $resul = Lugar::getLugar();
        $response->getBody()->write(json_encode($resul));
        var_dump($response);
        return $response;  
    }

    public function CrearLugar($request, $response, $args){
        $listaParametros = json_decode($request->getBody());
        //var_dumo($listaParametros);  
        $nuevoLugar = new Lugar();

        foreach ($listaParametros as $rs => $valueAtr){
            $nuevoLugar->{$rs} = $valueAtr;
        }
        Lugar::setLugar($nuevoLugar);

        $response->getBody()->write(json_encode($nuevoLugar));
        return $response;
    }

 }

?>