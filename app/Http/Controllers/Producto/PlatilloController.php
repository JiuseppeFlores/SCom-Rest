<?php

namespace App\Http\Controllers\Producto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Producto\Producto;
use App\Models\Producto\Platillo;
use App\Http\Requests\Producto\PlatilloFormRequest;

class PlatilloController extends Controller
{
    public function index()
    {   
        $platillo = DB::table('producto')
            ->join('platillo','producto.idproducto','=','platillo.idproducto')
            ->get();

        $data = array('data' => $platillo, 'error' => []);
        return $data;
    }
    public function store(PlatilloFormRequest $request)
    {
        $producto = new Producto();
        $producto->idproducto = $request->idproducto;
        $producto->precio = $request->precio;
        $producto->nombre = $request->nombre;
        $producto->estado = $request->estado;
        $producto->save();

        $platillo = new Platillo();
        $platillo->idproducto = $request->idproducto;
        $platillo->stock = $request->stock;
        $platillo->save();

        $datos = DB::table('producto')
            ->join('platillo','producto.idproducto','=','platillo.idproducto')
            ->where('producto.idproducto','=',$platillo->idproducto)
            ->get()
            ->first();

        $data = array('data' => $datos, 'error' => []);
        return $data; 
    }

    public function show($idproducto)
    {
        $platillo = DB::table('producto')
        ->join('platillo','producto.idproducto','=','platillo.idproducto')
        ->where('producto.idproducto','=',$idproducto)
        ->get()
        ->first();

        $ingredientes = DB::table('tiene')
        ->join('ingrediente','ingrediente.codingrediente','=','tiene.codingrediente')
        ->where('idproducto','=',$platillo->idproducto)
        ->get();

        //$platillo -> join($ingredientes)
        $data = array('data' => array($platillo,$ingredientes), 'error' => []);
        return $data;
    }

    public function update(PlatilloFormRequest $request, $idproducto)
    {
        $producto = Producto::findOrFail($idproducto);
        $producto->idproducto = $request->idproducto;
        $producto->precio = $request->precio;
        $producto->nombre = $request->nombre;
        $producto->estado = $request->estado;
        $producto->save();

        $platillo = Platillo::findOrFail($idproducto);
        $platillo->idproducto = $request->idproducto;
        $platillo->stock = $request->stock;
        $platillo->save();

        $datos = DB::table('producto')
        ->join('platillo','producto.idproducto','=','platillo.idproducto')
        ->where('producto.idproducto','=',$platillo->idproducto)
        ->get()
        ->first();

        $data = array('data' => $datos,'error' => []);
        return $data;
    }

    public function destroy($idproducto)
    {
        $producto = Producto::destroy($idproducto);
        $platillo = Platillo::destroy($idproducto);
        
        $data = array('data' => (object)null, 'error' => []);
        return $data;
    }
}