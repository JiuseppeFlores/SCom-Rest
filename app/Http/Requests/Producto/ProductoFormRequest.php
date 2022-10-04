<?php

namespace App\Http\Requests\Producto;

use App\Http\Requests\Api\FormRequest;
use Illuminate\Validation\Rule;

class ProductoFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            //
            'idproducto' => ['numeric','digits_between:1,12',Rule::unique('producto')->ignore($this->route('idproducto'),'idproducto')],
            'precio' => ['numeric','required','digits_between:1,12'],
            'nombre' => ['filled','required','min:1','max:40'],
            'estado' => ['filled','required','min:1','max:30','in:habilitado,deshabilitado'],
            'tipoProducto' =>['required','filled','min:1','max:40','in:platillo,bebida']
        ];
    }
    public function attributes()
    {
        return [
            'idproducto' => 'identificador de producto',
            'precio' => 'precio',
            'nombre' => 'nombre',
            'estado' => 'estado',
            'tipoProducto' => 'tipo de producto',
        ];
    }
}