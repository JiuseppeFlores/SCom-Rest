<?php

namespace App\Http\Controllers\Producto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Producto\Producto;
use App\Models\Producto\Platillo;
use App\Models\Producto\Bebida;
use App\Http\Requests\Producto\ProductoFormRequest;

class ProductoController extends Controller
{
    public function index()
    {
        
        if(isset($_GET['estado'])){
            $estado = $_GET['estado'];
            switch ($estado){
                case 'habilitado':
                    $datos = Producto::all()->where('estado','=','habilitado');
                    $converter = collect($datos->values()->all());
                    $data = array('data' => $converter, 'error' => []);
                    return $data;
                    break;
                case 'deshabilitado':
                    $datos=Producto::all()->where('estado','=','deshabilitado');
                    $converter = collect($datos->values()->all());
                    $data = array('data' => $converter, 'error' => []);
                    return $data;
                    break;
            }
        }else{
            $datos=Producto::all();
            $data = array('data' => $datos, 'error' => []);
            return $data;
        }
    }
    public function store(ProductoFormRequest $request)
    {
        $producto = new Producto();
        $producto->idproducto = $request->idproducto;
        $producto->precio = $request->precio;
        $producto->nombre = $request->nombre;
        $producto->estado = $request->estado;
        $producto->imagen = $request->imagen;
        $producto->tipoProducto = $request->tipoProducto;
        $producto->save();

        //$data = array('response' => 'true','data' => $producto);
        $data = array('data' => $producto, 'error' => []);
        return $data;
    }
    public function show($codproducto)
    {
        $producto = Producto::find($codproducto);
        
        //$data = array('response' => 'true','data' => $producto);
        $data = array('data' => $producto, 'error' => []);
        return $data;
    }
    public function update(ProductoFormRequest $request, $idproducto)
    {
        $producto = Producto::findOrFail($idproducto);
        $producto->idproducto = $request->idproducto;
        $producto->precio = $request->precio;
        $producto->nombre = $request->nombre;
        $producto->estado = $request->estado;
        $producto->tipoProducto = $request->tipoProducto;
        $producto->imagen = $request->imagen;
        $producto->update();
        //$data = array('response' => 'true','data' => $producto);
        $data = array('data' => $producto, 'error' => []);
        return $data;
    }
    public function destroy($idproducto)
    {
        $producto = Producto::destroy($idproducto);

        //$data = array("response" => "true","data" => array($producto));
        $data = array('data' => (object)null, 'error' => []);
        return $data;
    }
    public function productoHabilita($idproducto){
        $producto = Producto::findOrFail($idproducto);
        $producto->estado = 'habilitado';
        $producto->save();

        $data = array('data' => $producto, 'error' => []);
        return $data;
    }
    public function productoDeshabilita($idproducto){
        $producto = Producto::findOrFail($idproducto);
        $producto->estado = 'deshabilitado';
        $producto->save();

        $data = array('data' => $producto, 'error' => []);
        return $data;
    }
    public function obtenerProducto(Request $request){
        $producto = Producto::findOrFail($request->idProducto);
        switch($producto->tipoProducto){
            case "platillo":
                $ingrediente = DB::table('tiene')
                    ->join('ingrediente','ingrediente.codingrediente','=','tiene.codingrediente')
                    ->where('idproducto','=',$producto->idproducto)->get();
                $producto->ingredientes = $ingrediente;
                break;
            case "bebida":
                $bebida = Bebida::findOrFail($producto->idproducto);
                $producto->bebida = $bebida;
                break;
        }
        $data = array('data' => $producto, 'error' => []);
        return $data;
    }
}