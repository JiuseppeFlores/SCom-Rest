<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\UsuarioController;
use App\Http\Controllers\Users\CajeroController;
use App\Http\Controllers\Users\ClienteController;

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