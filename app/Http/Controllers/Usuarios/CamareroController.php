<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usuarios\Camarero;
use App\Models\Usuarios\Usuario;
use App\Http\Requests\Usuarios\CamareroFormRequest;

class CamareroController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $camareros = DB::table('usuario')
            ->join('camarero','usuario.ci','=','camarero.ci')
            ->get();
        $data = array('data' => $camareros,'error' => []);
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

        $camarero = new Camarero();
        $camarero->ci = $request->ci;
        $camarero->fechaContratacion = $request->fechaContratacion;
        $camarero->salario = $request->salario;
        $camarero->save();

        $datos = DB::table('usuario')
            ->join('camarero','usuario.ci','=','camarero.ci')
            ->where('usuario.ci','=',$camarero->ci)
            ->get()
            ->first();

        $data = array('data' => $datos,'error' => []);
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
        $cliente = DB::table('usuario')
            ->join('camarero','usuario.ci','=','camarero.ci')
            ->where('usuario.ci','=',$ci)
            ->get()
            ->first();
        $data = array('data' => $cliente,'error' => []);
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

        $camarero = Camarero::findOrFail($ci);
        $camarero->ci = $request->ci;
        $camarero->fechaContratacion = $request->fechaContratacion;
        $camarero->salario = $request->salario;
        $camarero->update();

        $datos = DB::table('usuario')
            ->join('camarero','usuario.ci','=','camarero.ci')
            ->where('usuario.ci','=',$camarero->ci)
            ->get()
            ->first();
        $data = array('data' => $datos,'error' => []);
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
        $camarero = Camarero::destroy($ci);
        $data = array('data' => (object)null, 'error' => []);
        return $data;
    }
}
