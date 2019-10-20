<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Http\Requests\PerfilFormRequest;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PerfilsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Perfil::all();
        return view('perfil.index')->with('dados',$dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perfil.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerfilFormRequest $request)
    {
        $validacao = $request->all();
        $dados = new Perfil();
        $dados->nome = $request->nome;
        $dados->usuario_alteracao = Auth()->user()->nome;
        $dados->save();
        return redirect()->action('PerfilsController@index')->with('success', 'Cadastrado com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_perfil)
    {
        return view('perfil.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_perfil)
    {
        $dados = Perfil::find($id_perfil);
        return view('perfil.edit')->with('dados',$dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PerfilFormRequest $request, $id_perfil)
    {
        $validacao = $request->all();
        $dados = Perfil::find($id_perfil);
        $dados->nome = $request->nome;
        $dados->usuario_alteracao = Auth()->user()->nome;
        $dados->update();
        return redirect()->action('PerfilsController@index')->with('success', 'Alterado com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_perfil)
    {
        $dados = Perfil::find($id_perfil);
        $dados->delete();
        return redirect()->action('PerfilsController@index')->with('success', 'Excluído com Sucesso!');
    }

    public function geraPDF()
    {
        $dados = Perfil::all()->sortBy('nome');
        return \PDF::loadView('relatorios.relatorioperfils', compact('dados'))
            ->setPaper('A4-P', 'landscape')
            ->download('Relatorio_Perfil.pdf');
    }
}
