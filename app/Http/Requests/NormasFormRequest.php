<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NormasFormRequest extends FormRequest
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
            'numero_norma' => 'required|max:2',
            'paragrafo' => 'required|max:15',
            'descricao' => 'required|max:400'
        ];
    }

    public function messages()
    {
        return  [
            'numero_norma.required' => 'O preenchimento da norma é obrigatório',
            'numero_norma.max' => 'O campo numero da Norma contém apenas 2 dígitos',
            'paragrafo.required' => 'O preenchimento do campo Parágrafo é obrigatório',
            'paragrafo.max' => 'O campo Parágrafo tem que ter menos que 15 caracteres',
            'descricao.required' => 'O preenchimento do campo Descrição é obrigatório',
            'descricao.max' => 'O campo Descrição tem que ter menos que 400 caracteres'
            
        ];
    }
}

