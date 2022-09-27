<?php

namespace App\Http\Requests\Factura;

use App\Http\Requests\Api\FormRequest;
use Illuminate\Validation\Rule;


class FacturaFormRequest extends FormRequest
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
            'codfactura' => ['numeric','required','digits_between:1,12',Rule::unique('factura')->ignore($this->route('codfactura'),'codfactura')],
            'ciCajero' => ['numeric','required','digits_between:1,12'],
            'ciCliente' => ['numeric','required','digits_between:1,12']
        ];
    }
    public function attributes()
    {
        return [
            'codfactura' => 'codigo de factura',
            'ciCajero' => 'CI de el Cajero',
            'ciCliente' => 'CI de el Cliente'
        
        ];
    }

}
