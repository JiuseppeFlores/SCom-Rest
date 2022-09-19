<?php

namespace App\Http\Controllers\Factura;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Factura\Factura;

class FacturaController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas = Factura::all();
        $data = array('data' => $facturas,'error' => []);
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacturaFormRequest $request)
    {
        $factura = new Factura();
        $factura->codFactura = $request->codFactura;
        $factura->ciCajero = $request->ciCajero;
        $factura->ciCliente = $request->ciCliente;
      

        $factura->save();

        $data = array('response' => 'true','data' => $factura);
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $factura = Factura::find($id);
        
        $data = array('response' => 'true','data' => $factura);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FacturaFormRequest $request, $codFactura)
    {
        $factura = Factura::findOrFail($codFactura);
        $factura->codFactura = $request->codFactura;
        $factura->ciCajero = $request->ciCajero;
        $factura->ciCliente = $request->ciCliente;
     

        $factura->save();
        $data = array('response' => 'true','data' => $factura);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($codFactura)
    {
        $factura = Factura::destroy($codFactura);
        $data = array("response" => "true","data" => array($factura));
        return $data;
    }
}
