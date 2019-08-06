<?php

namespace App\Http\Controllers;

use App\Models\UsuarioPerfil;
use App\Models\Perfil;
use App\Models\User;
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
        $usuario = User::all();
        $perfil  = Perfil::all();      
        return view('usuarioperfil.store')->with('usuario',$usuario)->with('perfil',$perfil);
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
        $dados->usuario_alteracao = '';
        $dados->save();
        return redirect()->action('UsuarioPerfilController@index')->with('messages', 'Perfil criado com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_usuarioperfil)
    {
        return view('usuarioperfil.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_usuarioperfil)
    {        
        $dados = UsuarioPerfil::find($id_usuarioperfil);
        $usuario = User::all();
        $perfil  = Perfil::all();      
        return view('usuarioperfil.edit')->with('usuario',$usuario)->with('perfil',$perfil)->with('dados', $dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioPerfilFormRequest $request, $id_usuarioperfil)
    {
        $validacao = $request->all();
        $dados = UsuarioPerfil::find($id_usuarioperfil);
        $dados->usuario_id = $request->usuario_id;
        $dados->perfil_id  = $request->perfil_id;
        $dados->usuario_alteracao = '';
        $dados->update();
        return redirect()->action('UsuarioPerfilController@index')->with('message', 'Perfil alterado com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_usuarioperfil)
    {
        $dados = UsuarioPerfil::find($id_usuarioperfil);
        $dados->delete();
        return redirect()->action('UsuarioPerfilController@index')->with('message', 'Perfil excluido com Sucesso!');
    }

}