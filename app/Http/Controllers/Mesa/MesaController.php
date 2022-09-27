<?php

namespace App\Http\Controllers\Mesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mesa\Mesa;
use App\Http\Requests\Mesa\MesaFormRequest;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesas = Mesa::all();
        $data = array('data' => $mesas,'error' => []);
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MesaFormRequest $request)
    {
        $mesa = new Mesa();
        $mesa->nroMesa = $request->nroMesa;
        $mesa->estado = $request->estado;
        $mesa->idpedido = $request->idpedido;
        $mesa->ciCamarero = $request->ciCamarero;
      

        $mesa->save();

        $data = array('data' => $mesa,'error' => []);
        return $data;

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nroMesa)
    {
        
        $mesa = Mesa::find($nroMesa);
        
        $data = array('data' => $mesa,'error' => []);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(mesaFormRequest $request, $nroMesa)
    {
        $mesa = Mesa::findOrFail($nroMesa);
        $mesa->nroMesa = $request->nroMesa;
        $mesa->estado = $request->estado;
        $mesa->idpedido = $request->idpedido;
        $mesa->ciCamarero = $request->ciCamarero;
     

        $mesa->save();
        $data = array('data' => $mesa,'error' => []);
        return $data;

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nroMesa)
    {
        $mesa = Mesa::destroy($nroMesa);

        $data = array('data' => (object)null, 'error' => []);
        return $data;
    }
}
