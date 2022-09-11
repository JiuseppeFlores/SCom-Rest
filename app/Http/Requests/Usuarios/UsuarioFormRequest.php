<?php

namespace App\Http\Requests\Usuarios;

use App\Http\Requests\Api\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioFormRequest extends FormRequest
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
            'ci' => 'numeric | required | digits_between:5,12',
            'ci' => [Rule::unique('usuario')->ignore($this->route('ci'),'ci')],
            'nombreUsuario' => 'filled | required | min:3 | max:25 | alpha_num',
            'contraseña' => 'filled | required | min:3 | max:25',
            'nombre' => 'filled | alpha | required | min:3 | max:25',
            'apellidoPaterno' => 'filled | alpha | required | min:3 | max:25',
            'apellidoMaterno' => 'sometimes | filled | alpha | min:3 | max:25',
            'estado' => 'required | in:habilitado,deshabilitado',
            'fechaNacimiento' => 'sometimes | nullable | date'
        ];
    }
    public function attributes()
    {
        return [
            'ci' => 'ci',
            'nombreUsuario' => 'nombre de usuario',
            'contraseña' => 'contraseña',
            'edad' => 'edad',
            'nombre' => 'nombre',
            'apellidoPaterno' => 'apellido paterno',
            'apellidoMaterno' => 'apellido materno',
            'estado' => 'estado',
            'fechaNacimiento' => 'fecha de nacimiento',
        ];
    }
}
