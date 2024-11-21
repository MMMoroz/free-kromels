<?php

require_once "vendor/autoload.php";

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use MiladRahimi\PhpRouter\Router;

$router = Router::create();

$router->get('/', [\App\Controllers\FrontController::class, 'index']);
$router->get('/post/{id}', [\App\Controllers\FrontController::class, 'showSinglePost']);

$router->get('/admin', [\App\Controllers\AdminController::class, 'index']);
$router->get('/admin', [\App\Controllers\AdminController::class, 'index']);

$router->dispatch();