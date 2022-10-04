<?php

namespace App\Http\Controllers\Producto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Producto\Producto;
use App\Http\Requests\Producto\ProductoFormRequest;

class ProductoController extends Controller
{
    public function index()
    {
       // $datos = DB::table('producto');
        $datos=Producto::all();
        $data = array('data' => $datos, 'error' => []);
        //$data = array('response' => 'true','data' => $datos);
        return $data;
    }
    public function store(ProductoFormRequest $request)
    {
        $producto = new Producto();
        $producto->idproducto = $request->idproducto;
        $producto->precio = $request->precio;
        $producto->nombre = $request->nombre;
        $producto->estado = $request->estado;
        $producto->tipo = $request->tipo;
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
        $producto->tipo = $request->tipo;
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
}