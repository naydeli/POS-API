<?php


use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\CompraController;


use Illuminate\Support\Facades\Route;


Route::apiResource(name: '/productos', controller: ProductoController::class);
Route::apiResource(name: '/proveedor', controller: ProveedorController::class);
Route::apiResource(name: '/cliente', controller: ClienteController::class);
Route::apiResource(name: '/venta', controller: VentaController::class);
Route::apiResource(name: '/compra', controller: CompraController::class);