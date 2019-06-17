<?php

namespace App\Http\Controllers;

use App\Models\SubParagrafo;
use App\Models\Paragrafo;
use App\Http\Requests\SubParagrafosFormRequest;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SubParagrafosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = SubParagrafo::all();
        return view('subparagrafo.index')->with('dados',$dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados = Paragrafo::all();
        return view('subparagrafo.store')->with('dados',$dados);
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
        $dados->usuario_alteracao = "";
        $dados->save();
        return redirect()->action('SubParagrafosController@index')->with('messages', 'Norma cadastrada com Sucesso!');
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
        $dados = SubParagrafo::find($id_subparagrafo);
        $dadosParagrafo = Paragrafo::all();
        return view('subparagrafo.edit')->with('dados',$dados)->with('dadosParagrafo',$dadosParagrafo);
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
        $dados->usuario_alteracao = "";
        $dados->update();
        return redirect()->action('SubParagrafosController@index')->with('messages', 'SubParagrafo cadastrado com Sucesso!');
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
        return redirect()->action('SubParagrafosController@index')->with('message', 'SubParagrafo excluido com Sucesso!');
    }
}
