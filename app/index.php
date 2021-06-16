<?php
include_once __DIR__ . "/../vendor/autoload.php";


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__.'/../vendor/autoload.php';

$app = AppFactory::create();

$app->addErrorMiddleware(true,true,true);

//con un solo parametros Ej: localhost:666/hola
$app->get('/usuario/{nombre}[/]', function (Request $request, Response $response, array $args) {
    $nombre= $args['nombre'];//[/] es opcional
    $response->getBody()->write("Hello, $nombre");
    return $response;
});
//con dos parametros Ej: localhost:666/hola/algo
$app->get('/hola/{nombre}/{apellido}', function (Request $request, Response $response, array $args) {
    $nombre = $args['nombre'];
    $apellido = $args['apellido'];
    $response->getBody()->write("Hello, $nombre.$apellido");
    return $response;
});
//corre desde app
$app->get('/app/[/]', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Usa el ruteo correctamente");
    return $response;
});
//corre desde localhost:666
$app->get('[/]', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Bienvenido al Slim");
    return $response;
});

$app->run();//corre como app

?>