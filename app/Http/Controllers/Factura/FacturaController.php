<?php

namespace App\Http\Controllers\Factura;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Factura\Factura;
use App\Http\Requests\Factura\FacturaFormRequest;

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
        $factura->codfactura = $request->codfactura;
        $factura->ciCajero = $request->ciCajero;
        $factura->ciCliente = $request->ciCliente;
      

        $factura->save();

        $data = array('data' => $factura,'error' => []);
        return $data;

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codfactura)
    {
        $factura = Factura::find($codfactura);
        
        $data = array('data' => $factura,'error' => []);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FacturaFormRequest $request, $codfactura)
    {
        $factura = Factura::findOrFail($codfactura);
        $factura->codfactura = $request->codfactura;
        $factura->ciCajero = $request->ciCajero;
        $factura->ciCliente = $request->ciCliente;
     

        $factura->save();
        $data = array('data' => $factura,'error' => []);
        return $data;

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($codfactura)
    {
        $factura = Factura::destroy($codfactura);

        $data = array('data' => (object)null, 'error' => []);
        return $data;
    }
}
