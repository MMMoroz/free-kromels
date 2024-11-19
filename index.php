<?php

require_once "vendor/autoload.php";

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use MiladRahimi\PhpRouter\Router;
use Laminas\Diactoros\Response\JsonResponse;

$router = Router::create();

$router->get('/', [\App\Controllers\FrontController::class, 'home']);
$router->get('/about', [\App\Controllers\FrontController::class, 'about']);
$router->get('/category/{name}', [\App\Controllers\FrontController::class, 'category']);

$router->dispatch();