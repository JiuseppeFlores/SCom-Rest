<?php

namespace App\Http\Requests\Pedido;

use App\Http\Requests\Api\FormRequest;
use Illuminate\Validation\Rule;

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
            'idpedido' => ['numeric','required','digits_between:1,12',Rule::unique('pedido')->ignore($this->route('idpedido'),'idpedido')],
            'estado' => ['required','in:vendido,espera,cancelado'],
            'fecha' => ['required','date'],
            'ciCamarero' => ['numeric','required','digits_between:1,12'],
            'codfactura' => ['numeric','required','digits_between:1,12'],
            'ciChef' => ['numeric','required','digits_between:1,12']
            
        ];
    }
    public function attributes()
    {
        return [
            'idpedido' => 'codigo de el pedido',
            'estado' => 'estado',
            'fecha' => 'fecha',
            'ciCamarero' => 'CI de el Camarero',
            'codfactura' => 'Condigo de la factura',
            'ciChef' => 'CI de el Chef'
        
        ];
    }

}
