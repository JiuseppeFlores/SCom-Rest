<?php

namespace App\Http\Requests\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest as LaravelFormRequest;

abstract class FormRequest extends LaravelFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    abstract public function rules();

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    abstract public function authorize();

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        //$response = array('response' => 'false','error' => $errors);
        $data = array();
        $llaves = array_keys($errors);
        for($i = 0;$i<count($errors);$i++){
            $error = $errors[$llaves[$i]];
            for($j = 0; $j < count($errors[$llaves[$i]]); $j++){
                array_push($data,$error[$j]);
            }
        }
        
        $response = array('data' => (object) null,'error' => $data);

        throw new HttpResponseException(
            //response()->json($response, JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
            response()->json($response)
        );
    }
}
