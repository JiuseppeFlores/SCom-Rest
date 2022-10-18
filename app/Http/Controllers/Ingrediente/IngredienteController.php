<?php

namespace App\Http\Controllers\Ingrediente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Ingrediente\Ingrediente;
use App\Http\Requests\Ingrediente\IngredienteFormRequest;


class IngredienteController extends Controller
{
    //
    public function index()
    {
        //$datos = DB::table('ingrediente');
        $datos = Ingrediente::all();
        $data = array('data' => $datos, 'error' => []);
        //$data = array('response' => 'true','data' => $datos);
        return $data;
    }

    public function store(IngredienteFormRequest $request)
    {
        $ingrediente = new Ingrediente();
       // $ingrediente->codIngrediente = $request->codIngrediente;
        $ingrediente->nombre = $request->nombre;
        $ingrediente->cantidad = $request->cantidad;
        $ingrediente->tipo = $request->tipo;

        $ingrediente->save();

        //$data = array('response' => 'true','data' => $ingrediente);
        $data = array('data' => $ingrediente, 'error' => []);
        return $data;
    }
    public function show($codIngrediente)
    {
        $ingrediente = Ingrediente::find($codIngrediente);
        
        //$data = array('response' => 'true','data' => $ingrediente);
        $data = array('data' => $ingrediente, 'error' => []);
        return $data;
    }
    public function update(IngredienteFormRequest $request, $codingrediente)
    {
        $ingrediente = Ingrediente::findOrFail($codingrediente);
        $ingrediente->codingrediente = $request->codingrediente;
        $ingrediente->nombre = $request->nombre;
        $ingrediente->cantidad = $request->cantidad;
        $ingrediente->tipo = $request->tipo;

        $ingrediente->save();
        //$data = array('response' => 'true','data' => $ingrediente);
        $data = array('data' => $ingrediente, 'error' => []);
        return $data;
    }

    public function destroy($codIngrediente)
    {
        $ingrediente = Ingrediente::destroy($codIngrediente);

        //$data = array("response" => "true","data" => array($ingrediente));
        $data = array('data' => (object)null, 'error' => []);
        return $data;
    }

    

    public function ingredienteAumentar($codingrediente){
        $ingrediente = Ingrediente::findOrFail($codingrediente);
        $ingrediente->cantidad =$ingrediente->cantidad+50;
        $ingrediente->save();
        $data = array('data' => $ingrediente->codingrediente , 'error' => []);
        return $data;
    }
}
