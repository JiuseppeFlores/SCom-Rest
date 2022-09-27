<?php

namespace App\Http\Requests\Mesa;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MesaFormRequest extends FormRequest
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
            'nroMesa' => ['numeric','required','digits_between:1,12',Rule::unique('mesa')->ignore($this->route('nroMesa'),'nroMesa')],
            'estado' => ['required','in:habilitado,deshabilitado'],
            'idPedido' => ['numeric','required','digits_between:1,12'],
            'ciCamarero' => ['numeric','required','digits_between:1,12']
        ];
    }
    public function attributes()
    {
        return [
            'nroMesa' => 'Numero de mesa',
            'estado' => 'estado',
            'idPedido' => 'codigo de el pedido',
            'ciCamarero' => 'CI de el Camarero'
        
        ];
    }

}
