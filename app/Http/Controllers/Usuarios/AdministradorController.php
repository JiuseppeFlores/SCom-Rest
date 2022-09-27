<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usuarios\Administrador;
use App\Models\Usuarios\Usuario;
use App\Http\Requests\Usuarios\AdministradorFormRequest;

class AdministradorController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $administradores = DB::table('usuario')
            ->join('administrador','usuario.ci','=','administrador.ci')
            ->get();
        $data = array('data' => $administradores, 'error' => []);
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdministradorFormRequest $request)
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
        $usuario->tipoUsuario = 'administrador';
        $usuario->save();

        $administrador = new Administrador();
        $administrador->ci = $request->ci;
        $administrador->save();

        $datos = DB::table('usuario')
            ->join('administrador','usuario.ci','=','administrador.ci')
            ->where('usuario.ci','=',$administrador->ci)
            ->get()
            ->first();
            
        $data = array('data' => $datos, 'error' => []);
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
        $admin = DB::table('usuario')
            ->join('administrador','usuario.ci','=','administrador.ci')
            ->where('usuario.ci','=',$ci)
            ->get()
            ->first();
        $usuarios = DB::table('gestiona')
            ->join('usuario','usuario.ci','=','gestiona.ciUsuario')
            ->where('ciAdministrador','=',$admin->ci)
            ->get();

        $data = array('data' => array($admin,$usuarios), 'error' => []);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdministradorFormRequest $request, $ci)
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

        $administrador = Administrador::findOrFail($ci);
        $administrador->ci = $request->ci;
        $administrador->update();

        $datos = DB::table('usuario')
            ->join('administrador','usuario.ci','=','administrador.ci')
            ->where('usuario.ci','=',$administrador->ci)
            ->get()
            ->first();
        $data = array('data' => $datos, 'error' => []);
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
        $administrador = Administrador::destroy($ci);
        $data = array('data' => (object)null, 'error' => []);
        return $data;
    }
}
