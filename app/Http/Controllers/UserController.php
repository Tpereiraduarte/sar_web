<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserFormRequest;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = User::all();
        return view('usuario.index')->with('dados',$dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $validacao = $request->all();
        $dados = new User();
        $dados->nome = $request->nome;
        $dados->password = $request->password;
        $dados->usuario_alteracao = "";
        $dados->save();
        return redirect()->action('UserController@index')->with('messages', 'Usuário criado com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_usuario)
    {
        return view('usuario.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_usuario)
    {
        $dados = User::find($$id_usuario);
        return view('usuario.edit')->with('dados',$dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, $id_usuario)
    {
        $validacao = $request->all();
        $dados = User::find($id_usuario);
        $dados->matricula = $request->matricula;
        $dados->nome = $request->nome;
        $dados->password = $request->password;
        $dados->categorias = $request->categorias; 
        $dados->usuario_alteracao = "";
        $dados->update();
        return redirect()->action('UserController@index')->with('message', 'Alterado com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_usuario)
    {
        $dados = User::find($id_usuario);
        $dados->delete();
        return redirect()->action('UserController@index')->with('message', 'Excluido com Sucesso!');
    }
}
