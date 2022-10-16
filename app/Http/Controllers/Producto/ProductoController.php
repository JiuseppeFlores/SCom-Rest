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
}