<?php

namespace App\Http\Requests\Opinion;

use App\Http\Requests\Api\FormRequest;
use Illuminate\Validation\Rule;


class OpinionFormRequest extends FormRequest
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
            'idOpinion' => ['numeric','digits_between:1,12',Rule::unique('Opinion')->ignore($this->route('idOpinion'),'idOpinion')],
            'nombre' => ['filled','required','min:1','max:200'],
            'apellido' => ['filled','required','min:1','max:200'],
            'correo' => ['filled','min:1','max:200'],
            'mensaje' => ['filled','min:1','max:10000'],
            'ciCliente' => ['numeric','required','digits_between:1,12']
        ];
    }
    public function attributes()
    {
        return [
            'idOpinion' => 'Identificador de Opinion',
            'nombre' => 'nombre',
            'apellido' => 'apellido',
            'correo' => 'correo electronico',
            'mensaje' => 'mensaje',
            'ciCliente' => 'ci del cliente'
        
        ];
    }

}
