<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdemServicosFormRequest extends FormRequest
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
            'numero_ordem_servico' => 'required|unique:ordem_servicos',
            'usuario_id' => 'required',
            'checklist_id' => 'required'
        ];
    }

    public function messages()
    {
        return  [
            'numero_ordem_servico.unique' => 'Já existe este número de ordem de serviço cadastrado',
            'numero_ordem_servico.required' => 'O preenchimento do número da ordem de serviço é obrigatório',
            'usuario_id.required' => 'É obrigatório a escolha de um usuário',
            'checklist_id.required' => 'É obrigatório a escolha de um checklist'           
        ];
    }
}

