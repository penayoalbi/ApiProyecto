<?php
error_reporting(-1);
ini_set('display_errors', 1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;
use Slim\Routing\RouteContext;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/AccesoDatos/accesoDatos.php';
require __DIR__ . '/entidades/usuario.php';
require __DIR__ . '/entidades/producto.php';
require __DIR__ . '/controllers/usuarioController.php';
require __DIR__ . '/controllers/productoController.php';
//crear un objeto
$app = AppFactory::create();

//interceptar paquetes entrantes
$app->addErrorMiddleware(true,true,true);
//$app->addRoutingMiddleware();

//Enable CORS
$app->add(function (Request $request, RequestHandlerInterface $handler): Response {
   // $routeContext = RouteContext::fromRequest($request);
   // $routingResults = $routeContext->getRoutingResults();
   // $methods = $routingResults->getAllowedMethods();
   // echo "pase por aqui. ";
    $response = $handler->handle($request);
  //var_dump($request);
    $requestHeaders = $request->getHeaderLine('Access-Control-Request-Headers');

    $response = $response->withHeader('Access-Control-Allow-Origin', '*');
    $response = $response->withHeader('Access-Control-Allow-Methods', 'get,post');
    $response = $response->withHeader('Access-Control-Allow-Headers', $requestHeaders);
    
    $response = $response->withHeader('Access-Control-Allow-Credentials', 'true');
    
     return $response;
});
$app->post('hola/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});
  //corre desde localhost:666
$app->get('/hola[/]', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("lleguee!");
    return $response;
});
//corre desde localhost:666
$app->get('[/]', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Bienvenido al Slim");
    return $response;
});
//$app->post('/usuario/new[/]', \usuarioController::class .':CrearUsuario');

$app->group('/usuario', function(RouteCollectorProxy $group){
    $group->post('/new[/]', \usuarioController::class .':CrearUsuario');
    $group->get('/login[/]', \usuarioController::class .':Login');
    $group->get('[/]', \usuarioController::class .':ObtenerUsuario');
   // $group->post('{valor}[/]', \usuarioController::class . ':LeerJSONPost' );
   // $group->put('/{id}[/]', \usuarioController::class . ':ModificarUsuario');
  //  $group->get('[/]', \usuarioController::class . ':ListarUsuario');
   
});

$app->group('/producto',function (RouteCollectorProxy $groupProducto){
    $groupProducto->post('[/]', \productoController::class .':CrearProductos');
    $groupProducto->get('[/]', \productoController::class .':ListarProductos');
    $groupProducto->delete('/borrar/{idproducto}', \productoController::class . ':BorrarProducto');
    //$groupProducto->put('[/]', \productoController::class .':ModificarProductos');
   // $groupProducto->get('[/]', \productoController::class .':ListarProductos');
   //$group->get('/imagen/{idProd}[/]', \productoController::class .':RetornarImagen');
    
});

$app->run();//corre como app

?>