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
            'norma' => 'required',
            'paragrafo' => 'required|max:50',
        ];

    }

    public function messages()
    {
        return  [
            'pergunta.required' => 'O preenchimento da pergunta é obrigatório',
            'pergunta.max' => 'A pergunta tem que ter menos que 200 caracteres',
            'norma.required' => 'O preenchimento da norma é obrigatório',
            'paragrafo.required' => 'O preenchimento do campo Parágrafo é obrigatório',
            'paragrafo.max' => 'O campo Parágrafo tem que ter menos que 50 caracteres'
        ];
    }
}
