<?php

namespace App\Http\Requests\Usuarios;

use App\Http\Requests\Api\FormRequest;
use Illuminate\Validation\Rule;

class ClienteFormRequest extends FormRequest
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
            'ci' => ['numeric','required','digits_between:5,12',Rule::unique('usuario')->ignore($this->route('ci'),'ci')],
            'nombreUsuario' => ['filled','required','min:3','max:25','alpha_num'],
            'contraseña' => ['filled','required','min:3','max:25'],
            'nombre' => ['filled','regex:/^[a-zA-Z\s]+$/u','required','min:3','max:25'],
            'apellidoPaterno' => ['filled','alpha','required','min:3','max:25'],
            'apellidoMaterno' => ['sometimes', 'nullable','alpha','min:3','max:25'],
            'estado' => ['required','in:habilitado,deshabilitado'],
            'fechaNacimiento' => ['sometimes','nullable','date'],
            'nit' => ['numeric','required','digits_between:5,12'],
            'email' => ['filled','required','min:3','max:50','alpha_num'],
            'ciCajeroAdiciona' => ['numeric','sometimes','nullable','digits_between:5,12']
        ];
    }
    public function attributes(){
        return [
            'ci' => 'ci',
            'nombreUsuario' => 'nombre de usuario',
            'contraseña' => 'contraseña',
            'nombre' => 'nombre',
            'apellidoPaterno' => 'apellido paterno',
            'apellidoMaterno' => 'apellido materno',
            'estado' => 'estado',
            'fechaNacimiento' => 'fecha de nacimiento',
            'nit' => 'nit',
            'email' => 'email',
            'ciCajeroAdiciona' => 'ci cajero'
        ];
    }
}
