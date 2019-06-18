<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioPerfilFormRequest extends FormRequest
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
            'usuario_id'=>  'required|max:100',
            'perfil_id' =>  'required|max:30'    
        ];
    }

    public function messages(){
        return  [
            'usuario_id.required' => 'O preenchimento do ID do usuário é obrigatório',
            'usuario_id.max' => 'O ID do usuário tem que ter menos que 100 caracteres',
            'perfil_id.required' => 'O ID do perfil é obrigatório',
            'perfil_id.max' => 'O ID do perfil tem que ter menos que 30 caracteres',
        ];
    }
}
