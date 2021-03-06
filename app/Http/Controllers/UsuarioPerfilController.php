<?php

namespace App\Http\Controllers;

use App\Models\UsuarioPerfil;
use App\Models\Perfil;
use App\Models\User;
use App\Http\Requests\UsuarioPerfilFormRequest;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Mobile_Detect;

class UsuarioPerfilController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detect = new Mobile_Detect;
        $dados = UsuarioPerfil::all();
        return view("usuarioperfil.index",compact('dados','detect'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detect = new Mobile_Detect;
        $usuario = User::all();
        $perfil  = Perfil::all();      
        return view("usuarioperfil.store",compact('usuario','perfil','detect'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(UsuarioPerfilFormRequest $request)
    {
        $detect = new Mobile_Detect;
        $validacao = $request->all();
        $dados = new UsuarioPerfil();
        $dados->usuario_id = $request->usuario_id;
        $dados->perfil_id  = $request->perfil_id;
        $dados->usuario_alteracao = Auth()->user()->nome;
        $dados->save();
        return redirect()->action('UsuarioPerfilController@index')->with('success', 'Cadastrado com Sucesso!');
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
        $detect = new Mobile_Detect;
        $dados = UsuarioPerfil::find($id_usuarioperfil);
        $usuario = User::all();
        $perfil  = Perfil::all();      
        return view("usuarioperfil.edit",compact('usuario','perfil','dados','detect'));
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
        $dados->usuario_alteracao = Auth()->user()->nome;
        $dados->update();
        return redirect()->action('UsuarioPerfilController@index')->with('success', 'Alterado com Sucesso!');
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
        return redirect()->action('UsuarioPerfilController@index')->with('success', 'Excluído com Sucesso!');
    }

    public function geraPDF()
    {
        $dados = UsuarioPerfil::all()->sortBy('usuario_id');
        return \PDF::loadView('relatorios.relatoriousuarioperfil', compact('dados'))
            ->setPaper('a4', 'landscape')
            ->download('Relatorio_Usuario_Perfil.pdf');
    }

}