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
            'numero_norma' => 'required|unique:normas|max:2',
            'descricao' => 'required|max:200'
        ];
    }

    public function messages()
    {
        return  [
            'numero_norma.unique' => 'Já existe esta norma é cadastrada',
            'numero_norma.required' => 'O preenchimento da norma é obrigatório',
            'numero_norma.max' => 'O campo numero da Norma contém apenas 2 dígitos',
            'descricao.required' => 'O preenchimento do campo Descrição é obrigatório',
            'descricao.max' => 'O campo Descrição tem que ter menos que 200 caracteres'
            
        ];
    }
}

