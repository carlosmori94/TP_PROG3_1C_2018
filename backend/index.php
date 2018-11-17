<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../backend/vendor/autoload.php';
require_once '../backend/classes/dataAccess.php';
require_once '../backend/classes/ProductoApi.php';


$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;


$app = new \Slim\App(["settings" => $config]);

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

$app->group('/test', function(){
    $this->get('/{id}',\ProductoApi::class . ':TraerProducto'); 
  });

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});
$app->run();