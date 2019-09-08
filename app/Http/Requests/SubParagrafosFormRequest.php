<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubParagrafosFormRequest extends FormRequest
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
        return [
            'paragrafo_id' => 'required',
            'numero_paragrafo' => 'required|max:15',
            'descricao' => 'required|max:400'
        ];
    }

    public function messages()
    {
        return  [
            'paragrafo_id.required' => 'Por favor cadastrar a Norma',
            'numero_paragrafo.required' => 'O preenchimento do campo Parágrafo é obrigatório',
            'numero_paragrafo.max' => 'O campo Parágrafo tem que ter menos que 15 caracteres',
            'descricao.required' => 'O preenchimento do campo Descrição é obrigatório',
            'descricao.max' => 'O campo Descrição tem que ter menos que 400 caracteres'
            
        ];
    }
}

