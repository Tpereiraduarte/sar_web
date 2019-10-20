<?php

namespace App\Http\Controllers;

use App\Models\Paragrafo;
use App\Models\Norma;
use App\Http\Requests\ParagrafosFormRequest;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Mobile_Detect;

class ParagrafosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detect = new Mobile_Detect;
        $dados = Paragrafo::all();
        return view("paragrafo.index",compact('dados','detect'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detect = new Mobile_Detect;
        $dados = Norma::all()->sortBy("numero_norma");
        return view("paragrafo.store",compact('dados','detect'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParagrafosFormRequest $request)
    {
        $validacao = $request->all();
        $dados = new Paragrafo();
        $dados->norma_id = $request->norma_id;
        $dados->numero_paragrafo = $request->numero_paragrafo;
        $dados->descricao =$request->descricao;
        $dados->usuario_alteracao = Auth()->user()->nome;
        $dados->save();
        return redirect()->action('ParagrafosController@index')->with('success', 'Cadastrado com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_paragrafo)
    {
        return view('paragrafo.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_paragrafo)
    {
        $detect = new Mobile_Detect;
        $dados = Paragrafo::find($id_paragrafo);
        $dadosNorma = Norma::all()->sortBy("numero_norma");
        return view("paragrafo.edit",compact('dados','dadosNorma','detect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ParagrafosFormRequest $request, $id_paragrafo)
    {
         
        $validacao = $request->all();
        $dados = Paragrafo::find($id_paragrafo);
        $dados->norma_id = $request->norma_id;
        $dados->numero_paragrafo = $request->numero_paragrafo;
        $dados->descricao =$request->descricao;
        $dados->usuario_alteracao = Auth()->user()->nome;
        $dados->update();
        return redirect()->action('ParagrafosController@index')->with('success', 'Alterado com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_paragrafo)
    {
        $dados = Paragrafo::find($id_paragrafo);
        $dados->delete();
        return redirect()->action('ParagrafosController@index')->with('message', 'Excluído com Sucesso!');
    }
    public function geraPDF()
    {
        $dados = Paragrafo::all()->sortBy('numero_paragrafo');
        return \PDF::loadView('relatorios.relatorioparagrafo', compact('dados'))
            ->setPaper('a4', 'landscape')
            ->download('Relatorio_Paragrafo.pdf');
    }
}
