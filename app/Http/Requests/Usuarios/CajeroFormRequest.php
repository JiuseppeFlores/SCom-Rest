<?php

namespace App\Http\Requests\Usuarios;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Usuarios\UsuarioFormRequest;

class CajeroFormRequest extends UsuarioFormRequest
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
        //echo $this;
        return [
            //'fechaContratacion' => 'required'
        ];
    }
}
