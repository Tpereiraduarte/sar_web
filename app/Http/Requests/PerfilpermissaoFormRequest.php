<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class PerfilpermissaoFormRequest extends FormRequest
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
            'permissao_id'=>  'required',
            'perfil_id' =>  'required'
        ];
    }
    
    public function messages()
    {
        return  [
            'permissao_id.required' => 'O preenchimento do ID da permissão é obrigatório',
            'perfil_id.required' => 'O ID do perfil é obrigatório', 
        ];
    }
}