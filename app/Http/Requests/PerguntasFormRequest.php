<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerguntasFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return  [
            'pergunta' => 'required|max:200',
            'norma' => 'required|max:2'
        ];

    }

    public function messages()
    {
        return  [
            'pergunta.required' => 'O preenchimento da pergunta é obrigatório',
            'pergunta.max' => 'A pergunta tem que ter menos que 200 caracteres',
            'norma.max' => 'A norma contém apenas 2 dígitos',
            'norma.required' => 'O preenchimento da norma é obrigatório'
        ];
    }
}
