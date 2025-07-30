<?php

use App\Router;
use App\Controllers\HomeController;
use App\Controllers\ProductoController;

$router = new Router();
//Rutas para manejar Producto
$router->get('/', ProductoController::class, 'index');

$router->get('/producto/', ProductoController::class, 'index');
$router->get('/producto/create', ProductoController::class, 'create');
$router->post('/producto/save', ProductoController::class, 'addOrUpdate');
$router->post('/producto/estado', ProductoController::class, 'isDisponible');
$router->post('/producto/edit', ProductoController::class, 'edit');
$router->dispatch();
