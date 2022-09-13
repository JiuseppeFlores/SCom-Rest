<?php

namespace App\Http\Requests\Ingrediente;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IngredienteFormRequest extends FormRequest
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
            //
            'codIngrediente' => ['numeric','required','digits_between:1,12',Rule::unique('ingrediente')->ignore($this->route('codIngrediente'),'codIngrediente')],
            'nombre' => ['filled','required','min:3','max:30'],
            'cantidad' => ['numeric','required','digits_between:1,12'],
            'tipo' => ['filled','required','min:1','max:30']
        ];
    }
    public function attributes()
    {
        return [
            'codIngrediente' => 'codIngrediente',
            'nombre' => 'nombre',
            'cantidad' => 'cantidad',
            'tipo' => 'tipo',
        ];
    }
}
