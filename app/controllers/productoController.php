<?php

class ProductoController{

public function CrearProductos($request, $response, $args){
    $listaDeParametros = json_decode($request->getBody());
    var_dump($listaDeParametros);

    $nuevoProducto = new Producto();
    foreach ($listaDeParametros as $rs => $valueAtr){
        $nuevoProducto->{$rs} = $valueAtr;
    }
    Producto::CrearProducto($nuevoProducto);
   // $nuevoProducto->setNombre($listaDeParametros['nombre']);
   // $nuevoProducto->setDescripcion($listaDeParametros['descripcion']);
   // $nuevoProducto->CrearProducto();
   
    $response->getBody()->write(json_encode($nuevoProducto));
    return $response;
}
public function ListarProductos($request, $response, $args){
    $ObjetoProvenienteDelFront = $request->getParsedBody();
    $rs=new Producto();
   // $rs= Producto::ListarProducto($ObjetoProvenienteDelFront['buscar']);
    $rs= Producto::ListarProducto();
    $response->getBody()->write(json_encode($rs));
   // $response->getBody()->Write("productos...");
    return $response;
   // return $response ->withHeader('Content-Type', 'application/json');;
}
public function BorrarProducto($request, $response, $args){
    $aborrar = $request->getAttribute('idproducto');
    //$aborrar = $args['idproducto'];
    Producto::Borrar($aborrar);
    $response->getBody()->write('se borro id: '.$aborrar);
    return $response;
}

public function ModificarProductos($request, $response, $args){
    $id = $request->getAttribute('idproducto');
    $listaDeParametros = json_decode($request->getBody());

    $editar= new Producto();
    foreach ($listaDeParametros as $rs => $valueAtr){
        $editar->{$rs} = $valueAtr;
    }
    Producto::editar($id,$editar);
    return $response->getBody()->write("modificar Productos");
}

//buscar por nombre
public function BuscarProducto($request, $response, $args){
    $abuscar = json_decode($request->getBody());
    //$aborrar = $args['idproducto'];
    Producto::Buscar($abuscar);
    $response->getBody()->write(json_encode($abuscar));
    return $response;
}
/*
public function RetornarProductos($request, $response, $args){
    $listaProd =  json_decode(Archivos::leerArchivo('uploads/productos.json'));    
    $arrayProd = array();
    //recorro los objetos de la lista
    foreach ($listaProd as  $objStandar) {
        //recorro los valores del objeto
        $tempProd = new Producto();
        foreach ($objStandar as $atr => $valueAtr) {
            $tempProd->{$atr} = $valueAtr;
        }
        array_push($arrayProd,$tempProd);  
    }
    $arrayProductos = Producto::obtenerTodos();
    $response->getBody()->write(json_encode($arrayProductos));
    return $response ->withHeader('Content-Type', 'application/json');;
}*/

public function RetornarPost($request, $response, $args){
    $valor =  $request->getParsedBody();
    $response->getBody()->Write($valor['retornar post']);
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
    
    $response->getBody()->Write(json_encode($ObjetoProvenienteDelFront));
    return $response;
}
/*
public function RetornarImagen($request, $response, $args){
    $valorImagen = $args['idproducto'];
    $imagen = "";    

    switch ($valorImagen) {
        case '2':
            $imagen =  "/Img/MiImagen.png";
            break;
        case '06':
            $imagen =  "/Img/06.jpg";
            break;
        case '14':
            $imagen =  "/Img/14.png";
            break;

        case '42':
            $imagen =  "/Img/42.png";
            break;
        case '82':
            $imagen =  "/Img/82.png";
            break;
                    
        default:
            $imagen =  "/Img/404.jpg";
            break;          
        }

    $response->getBody()->Write($imagen);

    return $response;
}*/

}