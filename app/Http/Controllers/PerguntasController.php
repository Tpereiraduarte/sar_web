<?php

namespace App\Http\Controllers;

use App\Models\Pergunta;
use App\Http\Requests\PerguntasFormRequest;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PerguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Pergunta::all();
        return view('pergunta.index')->with('dados',$dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pergunta.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerguntasFormRequest $request)
    {
        $validacao = $request->all();
        $dados = new Pergunta();
        $dados->pergunta = $request->pergunta;
        $dados->norma = $request->norma;
        $dados->usuario_alteracao = "";
        $dados->save();
        return redirect()->action('PerguntasController@index')->with('messages', 'Pergunta criada com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pergunta)
    {
        return view('pergunta.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pergunta)
    {
        $dados = Pergunta::find($id_pergunta);
        return view('pergunta.edit')->with('dados',$dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PerguntasFormRequest $request, $id_pergunta)
    {
        $validacao = $request->all();
        $dados = Pergunta::find($id_pergunta);
        $dados->pergunta = $request->pergunta;
        $dados->norma = $request->norma;
        $dados->usuario_alteracao = "";
        $dados->update();
        return redirect()->action('PerguntasController@index')->with('message', 'Alterado com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pergunta)
    {
        $dados = Pergunta::find($id_pergunta);
        $dados->delete();
        return redirect()->action('PerguntasController@index')->with('message', 'Alterado com Sucesso!');
    }
}
