<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductoController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\VentaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/productos', [ProductoController::class, 'index']);
Route::get('/clientes', [ClienteController::class, 'index']);
Route::get('/ventas', [VentaController::class, 'index']);
Route::get('/ventas/mes', [VentaController::class, 'ventasMesActual']);
