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
            'matricula' =>  'required|5'
            'nome'      => 'required|max:100'
            'password'  => 'required|100'
            'categorias'=> 'required|50'
           
        ];
    }
    public function messages(){
        return  [
            'matricula.required' => 'O preenchimento da matricula é obrigatório',
            'matricula.max' => 'A matricula tem que ter menos que 5 caracteres',
            'nome.required' => 'O preenchimento do nome é obrigatório',
            'nome.max' => 'O nome tem que ter menos que 100 caracteres',
            'password.required' => 'O preenchimento da senha é obrigatório',
            'password.max' => 'A senha tem que ter menos que 100 caracteres',
            'categorias.required' => 'O preenchimento das categorias é obrigatório',
            'categorias.max' => 'A caracteristica tem que ter menos que 50 caracteres',
        ];
    }
}
