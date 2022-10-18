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
use App\Http\Controllers\Producto\ProductoController;
use App\Http\Controllers\Producto\BebidaController;
use App\Http\Controllers\Producto\PlatilloController;
use App\Http\Controllers\Factura\FacturaController;
use App\Http\Controllers\Pedido\PedidoController;
use App\Http\Controllers\Mesa\MesaController;
use App\Http\Controllers\Opinion\OpinionController;

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
    Route::post('administrador/', 'store');
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
    Route::put('chefSolicita/{ci}/{codIngrediente}','chefSolicita');
    Route::get('mostrarSolicita/','mostrarSolicita');
});

Route::controller(IngredienteController::class)->group(function(){
    Route::get('ingredientes/', 'index');
    Route::post('ingrediente/', 'store');
    Route::get('ingrediente/{codingrediente}', 'show');
    Route::put('ingrediente/{codingrediente}', 'update');
    Route::delete('ingrediente/{codingrediente}', 'destroy');
    Route::put('ingredienteAumentar/{codingrediente}','ingredienteAumentar');
});

Route::controller(ProductoController::class)->group(function(){
    Route::get('productos/','index');
    Route::post('producto/','store');
    Route::get('producto/{idproducto}','show');
    Route::put('producto/{idproducto}','update');
    Route::delete('producto/{idproducto}','destroy');
    Route::put('productoHabilita/{idproducto}','productoHabilita');
    Route::put('productoDeshabilita/{idproducto}','productoDeshabilita');
    Route::post('obtenerproducto/','obtenerProducto');
});

Route::controller(BebidaController::class)->group(function(){
    Route::get('bebidas/','index');
    Route::post('bebida/','store');
    Route::get('bebida/{idproducto}','show');
    Route::put('bebida/{idproducto}','update');
    Route::delete('bebida/{idproducto}','destroy');
});

Route::controller(PlatilloController::class)->group(function(){
    Route::get('platillos/','index');
    Route::post('platillo/','store');
    Route::get('platillo/{idproducto}','show');
    Route::put('platillo/{idproducto}','update');
    Route::delete('platillo/{idproducto}','destroy');
});
/*
Route::controller(Controller::class)->group(function(){
    Route::get('','index');
    Route::post('','store');
    Route::get('','show');
    Route::put('','update');
    Route::delete('','destroy');
});
*/


Route::controller(FacturaController::class)->group(function(){
    Route::get('facturas/','index');
    Route::post('factura/','store');
    Route::get('factura/{codfactura}','show');
    Route::put('factura/{codfactura}','update');
    Route::delete('factura/{codfactura}','destroy');
});

Route::controller(PedidoController::class)->group(function(){
    Route::get('pedidos/','index');
    Route::post('pedido/','store');
    Route::get('pedido/{idpedido}','show');
    Route::put('pedido/{idpedido}','update');
    Route::delete('pedido/{idpedido}','destroy');
    Route::put('pedidovendido/{idpedido}/{codfactura}','cambioVendido');
    Route::put('pedidoentregado/{idpedido}/{ci}','cambioEntregado');
    Route::put('pedidorealizado/{idpedido}','cambioRealizado');
    Route::put('pedidohabilitado/{idpedido}','cambioHabilitado');
    Route::put('pedidoaddfactura/{codfactura}/{idpedido}','añadirfactura');
    Route::post('crearpedido/','crearPedido');
    Route::post('obtenerPedido/','obtenerPedido');
});

Route::controller(MesaController::class)->group(function(){
    Route::get('mesas/','index');
    Route::post('mesa/','store');
    Route::get('mesa/{nroMesa}','show');
    Route::put('mesa/{nroMesa}','update');
    Route::delete('mesa/{nroMesa}','destroy');
});


Route::controller(OpinionController::class)->group(function(){
    Route::get('opiniones/','index');
    Route::post('opinion/','store');
    Route::get('opinion/{idOpinion}','show');
    Route::put('opinion/{idOpinion}','update');
    Route::delete('opinion/{idOpinion}','destroy');
});
