<?php

namespace App\Http\Requests\Usuarios;

use App\Http\Requests\Api\FormRequest;

class LoginFormRequest extends FormRequest
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
            'user' => ['required','min:3','max:45','exists:usuario,nombreUsuario'],
            'password' => ['required','min:3','max:45'],
        ];
    }

    public function attributes(){
        return [
            'user' => 'usuario',
            'password' => 'contraseña'
        ];
    }

    public function messages(){
        return [
            'user.exists' => 'El usuario no se encuentra registrado.'
        ];
    }
}
