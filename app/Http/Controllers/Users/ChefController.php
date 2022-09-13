<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Chef;
use App\Models\Usuario;

class ChefController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $chefs = DB::table('usuario')
            ->join('chef','usuario.ci','=','chef.ci')
            ->get();
        return $chefs;
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

        $chef = new Chef();
        $chef->ci = $request->ci;
        $chef->fechaContratacion = $request->fechaContratacion;
        $chef->especialidad = $request->especialidad;
        $chef->salario = $request->salario;
        $chef->save();

        $datos = DB::table('usuario')
            ->join('chef','usuario.ci','=','chef.ci')
            ->where('usuario.ci','=',$chef->ci)
            ->get()
            ->first();
        return $datos;
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
            ->join('chef','usuario.ci','=','chef.ci')
            ->where('usuario.ci','=',$ci)
            ->get()
            ->first();

        return $cliente;
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

        $chef = Chef::findOrFail($ci);
        $chef->ci = $request->ci;
        $chef->fechaContratacion = $request->fechaContratacion;
        $chef->especialidad = $request->especialidad;
        $chef->salario = $request->salario;
        $chef->update();

        $datos = DB::table('usuario')
            ->join('chef','usuario.ci','=','chef.ci')
            ->where('usuario.ci','=',$chef->ci)
            ->get()
            ->first();

        return $datos;
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
        $chef = Chef::destroy($ci);
        return $chef;
    }
}
