<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usuarios\Cliente;
use App\Models\Usuarios\Usuario;
use App\Http\Requests\Usuarios\ClienteFormRequest;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        /*$clientes = Cliente::all();*/
        $datos = DB::table('usuario')
            ->join('cliente','usuario.ci','=','cliente.ci')
            ->get();

        $data = array('response' => 'true','data' => $datos);
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new Usuario();
        $usuario->ci = $request->ci;
        $usuario->nombreUsuario = $request->nombreUsuario;
        $usuario->contraseña = $request->contraseña;
        $usuario->fechaNacimiento = $request->fechaNacimiento;
        $usuario->nombre = $request->nombre;
        $usuario->apellidoPaterno = $request->apellidoPaterno;
        $usuario->apellidoMaterno = $request->apellidoMaterno;
        $usuario->estado = $request->estado;
        $usuario->save();

        $cliente = new Cliente();
        $cliente->ci = $request->ci;
        $cliente->nit = $request->nit;
        $cliente->email = $request->email;
        $cliente->ciCajeroAdiciona = $request->ciCajeroAdiciona;
        $cliente->save();

        $datos = DB::table('usuario')
            ->join('cliente','usuario.ci','=','cliente.ci')
            ->where('usuario.ci','=',$cliente->ci)
            ->get()
            ->first();
        
        $data = array('response' => 'true','data' => $datos);
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ci)
    {
        $datos = DB::table('usuario')
            ->join('cliente','usuario.ci','=','cliente.ci')
            ->where('usuario.ci','=',$ci)
            ->get()
            ->first();

        $data = array('response' => 'true','data' => $datos);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ci)
    {
        $usuario = Usuario::findOrFail($ci);
        $usuario->ci = $request->ci;
        $usuario->nombreUsuario = $request->nombreUsuario;
        $usuario->contraseña = $request->contraseña;
        $usuario->fechaNacimiento = $request->fechaNacimiento;
        $usuario->nombre = $request->nombre;
        $usuario->apellidoPaterno = $request->apellidoPaterno;
        $usuario->apellidoMaterno = $request->apellidoMaterno;
        $usuario->estado = $request->estado;
        $usuario->update();

        $cliente = Cliente::findOrFail($ci);
        $cliente->ci = $request->ci;
        $cliente->nit = $request->nit;
        $cliente->email = $request->email;
        $cliente->ciCajeroAdiciona = $request->ciCajeroAdiciona;
        $cliente->update();

        $datos = DB::table('usuario')
            ->join('cliente','usuario.ci','=','cliente.ci')
            ->where('usuario.ci','=',$cliente->ci)
            ->get()
            ->first();

        $data = array('response' => 'true','data' => $datos);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ci)
    {
        $usuario = Usuario::destroy($ci);
        $cliente = Cliente::destroy($ci);
        $data = array('response' => 'true','data' => array($usuario,$cliente));
        return $data;
    }
}
