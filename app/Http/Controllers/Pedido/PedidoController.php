<?php

namespace App\Http\Controllers\Pedido;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedido\Pedido;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();
        $data = array('data' => $pedidos,'error' => []);
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PedidoFormRequest $request)
    {
        $pedido = new Pedido();
        $pedido->idpedido = $request->idpedido;
        $pedido->estado = $request->estado;
        $pedido->fecha = $request->fecha;
        $pedido->ciCamarero = $request->ciCamarero;
        $pedido->codFactura = $request->codFactura;
        $pedido->ciChef = $request->ciChef;
      

        $pedido->save();

        $data = array('data' => $pedido,'error' => []);
        return $data;

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idpedido)
    {
        $pedido = Pedido::find($idpedido);
        
        $data = array('data' => $pedido,'error' => []);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PedidoFormRequest $request, $idpedido)
    {
        $pedido = Pedido::findOrFail($idpedido);
        $pedido->idpedido = $request->idpedido;
        $pedido->estado = $request->estado;
        $pedido->fecha = $request->fecha;
        $pedido->ciCamarero = $request->ciCamarero;
        $pedido->codFactura = $request->codFactura;
        $pedido->ciChef = $request->ciChef;
     

        $pedido->save();
        $data = array('data' => $pedido,'error' => []);
        return $data;

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idpedido)
    {
        $pedido = Pedido::destroy($idpedido);

        $data = array('data' => $pedido,'error' => []);
        return $data;
    }
}