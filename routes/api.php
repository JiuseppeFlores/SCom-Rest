<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usuarios\UsuarioController;
use App\Http\Controllers\Usuarios\CajeroController;
use App\Http\Controllers\Usuarios\ClienteController;
use App\Http\Controllers\Usuarios\AdministradorController;
use App\Http\Controllers\Usuarios\CamareroController;
use App\Http\Controllers\Usuarios\ChefController;
use App\Http\Controllers\Ingrediente\IngredienteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(UsuarioController::class)->group(function(){
    Route::get('usuarios/', 'index');
    Route::post('usuario/', 'store');
    Route::get('usuario/{ci}', 'show');
    Route::put('usuario/{ci}', 'update');
    Route::delete('usuario/{ci}', 'destroy');
    Route::post('login/','login');
});

Route::controller(CajeroController::class)->group(function(){
    Route::get('cajeros/', 'index');
    Route::post('cajero/', 'store');
    Route::get('cajero/{ci}', 'show');
    Route::put('cajero/{ci}', 'update');
    Route::delete('cajero/{ci}', 'destroy');
});

Route::controller(ClienteController::class)->group(function(){
    Route::get('clientes/', 'index');
    Route::post('cliente/', 'store');
    Route::get('cliente/{ci}', 'show');
    Route::put('cliente/{ci}', 'update');
    Route::delete('cliente/{ci}', 'destroy');
});

Route::controller(AdministradorController::class)->group(function(){
    Route::get('administradores/', 'index');
    Route::post('adminisrador/', 'store');
    Route::get('administrador/{ci}', 'show');
    Route::put('administrador/{ci}', 'update');
    Route::delete('administrador/{ci}', 'destroy');
});

Route::controller(CamareroController::class)->group(function(){
    Route::get('camareros/', 'index');
    Route::post('camarero/', 'store');
    Route::get('camarero/{ci}', 'show');
    Route::put('camarero/{ci}', 'update');
    Route::delete('camarero/{ci}', 'destroy');
});

Route::controller(ChefController::class)->group(function(){
    Route::get('chefs/', 'index');
    Route::post('chef/', 'store');
    Route::get('chef/{ci}', 'show');
    Route::put('chef/{ci}', 'update');
    Route::delete('chef/{ci}', 'destroy');
});

Route::controller(IngredienteController::class)->group(function(){
    Route::get('ingredientes/', 'index');
    Route::post('ingrediente/', 'store');
    Route::get('ingrediente/{codIngrediente}', 'show');
    Route::put('ingrediente/{codIngrediente}', 'update');
    Route::delete('ingrediente/{codIngrediente}', 'destroy');
});
