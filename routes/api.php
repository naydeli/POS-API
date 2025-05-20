<?php


use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProductoVentaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;


// Definir rutas para login y registro
Route::post('/login', [AuthController::class, 'login']);

route::middleware('auth:sanctum')->group(function () {
    // cerrar sesión
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('/productos',ProductoController::class);
    Route::apiResource('/proveedores',ProveedorController::class);
    Route::apiResource('/clientes', ClienteController::class);
    Route::apiResource('/ventas',VentaController::class);
    Route::apiResource('/compras',CompraController::class);
    Route::apiResource('/productoventa',ProductoVentaController::class);
    Routes::apiResource('/notes',NoteController::class);


});



