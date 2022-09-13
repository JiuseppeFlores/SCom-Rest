<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usuarios\Cajero;
use App\Models\Usuarios\Usuario;
use App\Http\Requests\Usuarios\CajeroFormRequest;

class CajeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        /*$clientes = Cliente::all();*/
        $cajeros = DB::table('usuario')
            ->join('cajero','usuario.ci','=','cajero.ci')
            ->get();

        $data = array('response' => 'true','data' => $cajeros);
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CajeroFormRequest $request)
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

        $cajero = new Cajero();
        $cajero->ci = $request->ci;
        $cajero->fechaContratacion = $request->fechaContratacion;
        $cajero->salario = $request->salario;
        $cajero->save();

        $datos = DB::table('usuario')
            ->join('cajero','usuario.ci','=','cajero.ci')
            ->where('usuario.ci','=',$cajero->ci)
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
        $cajero = DB::table('usuario')
            ->join('cajero','usuario.ci','=','cajero.ci')
            ->where('usuario.ci','=',$ci)
            ->get()
            ->first();

        $data = array('response' => 'true','data' => $cajero);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CajeroFormRequest $request, $ci)
    {
        /*$val = new UsuarioFormRequest;
        $val->setContainer(app());*/
        //$request['attending'] = true;
        //app('App\Http\Requests\Usuarios\UsuarioFormRequest');
        //app('App\Http\Requests\Usuarios\CajeroFormRequest');

        /*$usuario = Usuario::findOrFail($ci);
        $usuario->ci = $request->ci;
        $usuario->nombreUsuario = $request->nombreUsuario;
        $usuario->contraseña = $request->contraseña;
        $usuario->fechaNacimiento = $request->fechaNacimiento;
        $usuario->nombre = $request->nombre;
        $usuario->apellidoPaterno = $request->apellidoPaterno;
        $usuario->apellidoMaterno = $request->apellidoMaterno;
        $usuario->estado = $request->estado;
        $usuario->update();

        $cajero = Cajero::findOrFail($ci);
        $cajero->ci = $request->ci;
        $cajero->fechaContratacion = $request->fechaContratacion;
        $cajero->salario = $request->salario;
        $cajero->update();

        $datos = DB::table('usuario')
            ->join('cajero','usuario.ci','=','cajero.ci')
            ->where('usuario.ci','=',$cajero->ci)
            ->get()
            ->first();

        $data = array('response' => 'true','data' => $datos);
        return $data;*/
        return "asdasd";
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
        $cajero = Cajero::destroy($ci);
        
        $data = array('response' => 'true','data' => array($usuario,$cajero));
        return $data;
    }
}
