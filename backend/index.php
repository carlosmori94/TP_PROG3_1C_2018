<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../backend/vendor/autoload.php';

require_once '../backend/classes/dataAccess.php';
require_once '../backend/classes/ProductoApi.php';
require_once '../backend/classes/UsuarioApi.php';
require_once '../backend/classes/EncuestaApi.php';


$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;


$app = new \Slim\App(["settings" => $config]);

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});


$app->group('/usuarios', function(){
    $this->post('/login', \UsuarioApi::class . ':Login'); 
  });
$app->group('/encuesta', function(){
    $this->post('/alta', \EncuestaApi::class . ':Alta'); 
  });
$app->group('/pedidos', function(){
    $this->post('/login', \UsuarioApi::class . ':Login'); 
  });
$app->group('/productos', function(){
    $this->post('/login', \UsuarioApi::class . ':Login'); 
  });
$app->group('/mesas', function(){
    $this->post('/login', \UsuarioApi::class . ':Login'); 
  });
$app->group('/facturas', function(){
    $this->post('/login', \UsuarioApi::class . ':Login'); 
  });
$app->group('/clientes', function(){
    $this->post('/alta', \ClienteApi::class . ':AltaCliente'); 
  });

$app->run();