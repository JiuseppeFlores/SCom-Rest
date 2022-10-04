<?php

namespace App\Http\Controllers\Producto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Producto\Producto;
use App\Models\Producto\Bebida;
use App\Http\Requests\Producto\BebidaFormRequest;

class BebidaController extends Controller
{
    public function index()
    {   
        $bebida = DB::table('producto')
            ->join('bebida','producto.idproducto','=','bebida.idproducto')
            ->get();

        $data = array('data' => $bebida, 'error' => []);
        return $data;
    }
    public function store(BebidaFormRequest $request)
    {
        $producto = new Producto();
        $producto->idproducto = $request->idproducto;
        $producto->precio = $request->precio;
        $producto->nombre = $request->nombre;
        $producto->estado = $request->estado;
        $producto->tipoProducto = 'bebida';
        $producto->save();

        $bebida = new Bebida();
        $bebida->idproducto = $producto->idproducto;
        $bebida->gradoAlcoholico = $request->gradoAlcoholico;
        $bebida->save();

        $datos = DB::table('producto')
            ->join('bebida','producto.idproducto','=','bebida.idproducto')
            ->where('bebida.idproducto','=',$producto->idproducto)
            ->get()
            ->first();

        $data = array('data' => $datos, 'error' => []);
        return $data; 
    }

    public function show($idproducto)
    {
        $bebida = DB::table('producto')
        ->join('bebida','producto.idproducto','=','bebida.idproducto')
        ->where('producto.idproducto','=',$idproducto)
        ->get()
        ->first();

        $data = array('data' => $bebida, 'error' => []);
        return $data;
    }

    public function update(BebidaFormRequest $request, $idproducto)
    {
        $producto = Producto::findOrFail($idproducto);
        $producto->idproducto = $request->idproducto;
        $producto->precio = $request->precio;
        $producto->nombre = $request->nombre;
        $producto->estado = $request->estado;
        $producto->tipoProducto = 'bebida';
        $producto->update();

        $bebida = Bebida::findOrFail($idproducto);
        $bebida->idproducto = $request->idproducto;
        $bebida->gradoAlcoholico = $request->gradoAlcoholico;
        $bebida->update();

        $datos = DB::table('producto')
        ->join('bebida','producto.idproducto','=','bebida.idproducto')
        ->where('producto.idproducto','=',$idproducto)
        ->get()
        ->first();

        $data = array('data' => $datos,'error' => []);
        return $data;
    }

    public function destroy($idproducto)
    {
        $producto = Producto::destroy($idproducto);
        $bebida = Bebida::destroy($idproducto);
        
        $data = array('data' => (object)null, 'error' => []);
        return $data;
    }
}