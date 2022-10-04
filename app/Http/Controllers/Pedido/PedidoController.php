<?php

namespace App\Http\Controllers\Pedido;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Pedido\Pedido;
use App\Http\Requests\Pedido\PedidoFormRequest;

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
        $pedido->estado = 'espera';
        $pedido->fecha = $request->fecha;
        $pedido->ciCamarero = $request->ciCamarero;
        $pedido->codfactura = $request->codfactura;
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
        
        $productos = DB::table('pedido_producto')
            ->join('producto','producto.idproducto','=','pedido_producto.idproducto')
            ->where('idpedido','=',$pedido->idpedido)
            ->get();

        $data = array('data' => $pedido,'productos' =>$productos,'error' => []);
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
        $pedido->codfactura = $request->codfactura;
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

        $data = array('data' => (object)null, 'error' => []);
        return $data;
    }

    public function cambioVendido($idpedido, $codfactura)
    {
        $pedido = Pedido::findOrFail($idpedido);
        
        $pedido->estado = 'vendido';
        $pedido->codfactura = $codfactura;

        $pedido->save();
        $data = array('data' => $pedido,'error' => []);
        return $data;   
    }

    public function cambioEntregado($idpedido, $ci)
    {
        $pedido = Pedido::findOrFail($idpedido);
        
        $pedido->estado = 'entregado';
        $pedido->ciChef = $ci;

        $pedido->save();
        $data = array('data' => $pedido,'error' => []);
        return $data;   
    }


    public function añadirfactura($codfactura, $idpedido)
    {
        $pedido = Pedido::findOrFail($idpedido);
        
        $pedido->codfactura = $codfactura;
        

        $pedido->save();
        $data = array('data' => $pedido,'error' => []);
        return $data;   
    }
    

}
