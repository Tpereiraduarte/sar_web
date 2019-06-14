<?php

namespace App\Http\Controllers;

use App\Models\UsuarioPerfil;
use App\Http\Requests\UsuarioPerfilFormRequest;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UsuarioPerfilController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = UsuarioPerfil::all();
        return view('usuarioperfil.index')->with('dados',$dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarioperfil.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(UsuarioPerfilFormRequest $request)
    {
        $validacao = $request->all();
        $dados = new UsuarioPerfil();
        $dados->usuario_id = $request->usuario_id;
        $dados->perfil_id  = $request->perfil_id;
        $dados->save();
        return redirect()->action('UsuarioPerfilController@index')->with('messages', 'Perfil criado com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_perfilUsuario)
    {
        return view('usuarioperfil.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_perfilUsuario)
    {
        $dados = UsuarioPerfil::find($id_perfilUsuario);
        return view('usuarioperfil.edit')->with('dados',$dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, $id_perfilUsuario)
    {
        $validacao = $request->all();
        $dados = UsuarioPerfil::find($id_perfilUsuario);
        $dados->usuario_id = $request->usuario_id;
        $dados->perfil_id  = $request->perfil_id;
        $dados->update();
        return redirect()->action('UsuarioPerfilController@index')->with('message', 'Perfil alterado com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_perfilUsuario)
    {
        $dados = UsuarioPerfil::find($id_perfilUsuario);
        $dados->delete();
        return redirect()->action('UsuarioPerfilController@index')->with('message', 'Perfil excluido com Sucesso!');
    }

}