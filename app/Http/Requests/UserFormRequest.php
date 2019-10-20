<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'matricula' =>  'required|unique:users|max:5',
            'nome'      => 'required|max:100',
            'password'  => 'required|min:8|max:15',
            'email'     =>'required|unique:users|max:50'          
        ];
    }
    public function messages(){
        return  [
            'matricula.required' => 'O preenchimento da matricula é obrigatório',
            'matricula.max' => 'A matricula tem que ter menos que 5 caracteres',
            'matricula.unique' => 'Já existe esse numero de matricula cadastro.',
            'nome.required' => 'O preenchimento do nome é obrigatório',
            'nome.max' => 'O nome tem que ter menos que 100 caracteres',
            'password.required' => 'O preenchimento da senha é obrigatório',
            'password.min' => 'A senha tem que ter menos que 8 caracteres',
            'password.max' => 'A senha tem que ter menos que 15 caracteres',
            'email.unique' => 'Já existe esse email cadastro.'
        ];
    }
}
