<?php

namespace App\Http\Controllers\Opinion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usuarios\Cliente;
use App\Models\Opinion\Opinion;
use App\Http\Requests\Opinion\OpinionFormRequest;

class OpinionController extends Controller
{
    public function index(){
        $datos=Opinion::all();
        $data = array('data' => $datos, 'error' => []);
        //$data = array('response' => 'true','data' => $datos);
        return $data;
    }
    public function store(OpinionFormRequest $request){
        $opinion = new Opinion();
     //   $opinion->idOpinion=$request->idOpinion;
        $opinion->nombre=$request->nombre;
        $opinion->apellido=$request->apellido;
        $opinion->email=$request->email;
        $opinion->mensaje=$request->mensaje;
        $opinion->save();

        $data =array('data'=>$opinion,'error'=>[]);
        return $data;
    }

    public function show($idOpinion){
        $opinion=Opinion::find($idOpinion);
        $data = array('data' => $opinion, 'error' => []);
        return $data;
    }

    public function update(OpinionFormRequest $request,$idOpinion){
        $opinion = Opinion::findOrFail($idOpinion);
        $opinion->idOpinion=$request->idOpinion;
        $opinion->nombre=$request->nombre;
        $opinion->apellido=$request->apellido;
        $opinion->email=$request->email;
        $opinion->mensaje=$request->mensaje;
        $opinion->save();

        $data =array('data'=>$opinion,'error'=>[]);
        return $data;
    }
    public function destroy($idOpinion)
    {
        $opinion=Opinion::destroy($idOpinion);
        $data = array('data' => (object)null, 'error' => []);
        return $data;
    }

}