<?php

namespace App\Http\Controllers;

use App\Models\Norma;
use App\Models\Paragrafo;
use App\Models\SubParagrafo;
use App\Http\Requests\SubParagrafosFormRequest;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Mobile_Detect;

class SubParagrafosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detect = new Mobile_Detect;
        $dados = SubParagrafo::all();
        return view("subparagrafo.index",compact('dados','detect'));
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
        return view("subparagrafo.store",compact('dados','detect'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubParagrafosFormRequest $request)
    {
        $validacao = $request->all();
        $dados = new SubParagrafo();
        $dados->paragrafo_id = $request->paragrafo_id;
        $dados->numero_paragrafo = $request->numero_paragrafo;
        $dados->descricao = $request->descricao;
        $dados->usuario_alteracao = Auth()->user()->nome;
        $dados->save();
        return redirect()->action('SubParagrafosController@index')->with('success', 'Cadastrado com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_Subparagrafo)
    {
        return view('subparagrafo.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_subparagrafo)
    {
        $detect = new Mobile_Detect;
        $dadosNorma = Norma::all()->sortBy("numero_norma");
        $dados = DB::table('normas')
        ->join('paragrafos','normas.id_norma','=','paragrafos.norma_id')
        ->join('subparagrafos','paragrafos.id_paragrafo','=','subparagrafos.paragrafo_id')
        ->select('normas.id_norma',
                'paragrafos.id_paragrafo',
                'subparagrafos.id_subparagrafo',
                'normas.numero_norma',
                'paragrafos.numero_paragrafo',
                'subparagrafos.numero_paragrafo as numero_subparagrafo',
                'paragrafos.descricao',
                'subparagrafos.descricao')
        ->where('subparagrafos.id_subparagrafo',$id_subparagrafo)
        ->get();
        return view("subparagrafo.edit",compact('dados','dadosNorma','detect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubParagrafosFormRequest $request, $id_subparagrafo)
    {
         
        $validacao = $request->all();
        $dados = SubParagrafo::find($id_subparagrafo);
        $dados->paragrafo_id = $request->paragrafo_id;
        $dados->numero_paragrafo = $request->numero_paragrafo;
        $dados->descricao = $request->descricao;
        $dados->usuario_alteracao = Auth()->user()->nome;
        $dados->update();
        return redirect()->action('SubParagrafosController@index')->with('success', 'Alterado com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_subparagrafo)
    {
        $dados = SubParagrafo::find($id_subparagrafo);
        $dados->delete();
        return redirect()->action('SubParagrafosController@index')->with('success', 'Excluído com Sucesso!');
    }

    public function geraPDF()
    {
        $dados = SubParagrafo::all()->sortBy('numero_paragrafo');
        return \PDF::loadView('relatorios.relatoriosubparagrafo', compact('dados'))
            ->setPaper('a4', 'landscape')
            ->download('Relatorio_Sub_Paragrafo.pdf');
    }
}
