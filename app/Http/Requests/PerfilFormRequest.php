<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerfilFormRequest extends FormRequest
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
            'nome' => 'required|max:30'
        ];
    }
    public function messages(){
        return  [
            'nome.required' => 'O preenchimento do perfil é obrigatório',
            'nome.max' => 'O nome do perfil tem que ter menos que 30 caracteres'
        ];
    }
}
