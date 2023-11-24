<?php

namespace App\Http\Requests;

use Dotenv\Validator;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AgendaFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'profissional_id'=> 'required',
            'cliente_id'=> '',
            'servico_id'=> '',
            'data_hora'=> 'required|date',
            'tipo_pagamento'=>'|max:|20|min: 3',
            'valor'=> 'decimal:2',

        ];
    }
    public function failValidation (ValidationValidator $validator){
  throw new HttpResponseException(response ()->json([
    'sucess' => false,
    'error' => $validator->errors()
  ]));
    }

    public function messages(){
        return[
            'profissional_id.required'=> 'O campo profissional é obrigatorio',
            'data_hora.required'=> 'cliente obrigatoria',
            'data_hora.date'=> 'Formato invalido',
            'tipo_pagamento.max'=> 'o campo nome deve conter no maximo 20 caracteres ',
            'tipo_pagamento.min'=> 'o campo nome deve conter no maximo  3 cracteres',
            'valor_decimal:2'=> 'formato invalido',
        ];
    }
}