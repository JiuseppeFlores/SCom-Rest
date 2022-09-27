<?php

namespace App\Http\Requests\Pedido;

use Illuminate\Foundation\Http\FormRequest;

class PedidoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'idPedido' => ['numeric','required','digits_between:1,12',Rule::unique('pedido')->ignore($this->route('idPedido'),'idPedido')],
            'estado' => ['required','in:habilitado,deshabilitado'],
            'fecha' => ['required','date'],
            'ciCamarero' => ['numeric','required','digits_between:1,12'],
            'codFactura' => ['numeric','required','digits_between:1,12'],
            'ciChef' => ['numeric','required','digits_between:1,12']
            
        ];
    }
    public function attributes()
    {
        return [
            'idPedido' => 'codigo de el pedido',
            'estado' => 'estado',
            'fecha' => 'fecha',
            'ciCamarero' => 'CI de el Camarero',
            'codFactura' => 'Condigo de la factura',
            'ciChef' => 'CI de el Chef'
        
        ];
    }

}
