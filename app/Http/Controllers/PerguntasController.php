<?php

namespace App\Http\Controllers;

use App\Models\Pergunta;
use App\Models\Norma;
use App\Http\Requests\PerguntasFormRequest;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Mobile_Detect;

class PerguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detect = new Mobile_Detect;
        $dados = Pergunta::all();
        return view("pergunta.index",compact('dados','detect'));
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
        return view("pergunta.store",compact('dados','detect'));
    }
    
    public function dinamico(Request $request)
    {
        $value = $request->get('value');
        $data = DB::table('paragrafos')
                ->where('norma_id',$value)
                ->select('id_paragrafo','norma_id','numero_paragrafo','descricao')
                ->groupBy('id_paragrafo','norma_id','numero_paragrafo','descricao')
                ->orderBy('paragrafos.numero_paragrafo', 'asc')
                ->get();
        $resultado ='<option value="">Escolha o paragrafo desejado</option>';
        foreach($data as $key => $row){
            $resultado .='<option value="'.$row->id_paragrafo.'">'.$row->numero_paragrafo.' - '.$row->descricao.'</option>';
        }
        echo $resultado;
    }

    public function paragrafodinamico(Request $request)
    {
        $value = $request->get('value2');
        $dados = DB::table('subparagrafos')
                    ->where('paragrafo_id',$value)
                    ->orderBy('subparagrafos.numero_paragrafo', 'asc')
                    ->get();
        $resultado ='<div>';
            foreach($dados as $key => $row){
                $resultado .='<p>'.$row->numero_paragrafo.' - '.$row->descricao.'</p>';
            }
        $resultado .='</div>';
        echo $resultado;
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
        $dados->norma_id = $request->norma;
        $dados->paragrafo_id = $request->paragrafo;
        $dados->usuario_alteracao = Auth()->user()->nome;
        $dados->save();
        return redirect()->action('PerguntasController@index')->with('success', 'Cadastrado com Sucesso!');
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
        $detect = new Mobile_Detect;
        $dados = Pergunta::find($id_pergunta);
        $dadosNorma = Norma::all()->sortBy("numero_norma");
        //return view('pergunta.edit')->with('dados',$dados)->with('dadosNorma',$dadosNorma);
        return view("pergunta.edit",compact('dados','dadosNorma','detect'));
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
        $dados->norma_id = $request->norma;
        $dados->paragrafo_id = $request->paragrafo;
        $dados->usuario_alteracao = Auth()->user()->nome;
        $dados->update();
        return redirect()->action('PerguntasController@index')->with('success', 'Alterado com Sucesso!');
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
        return redirect()->action('PerguntasController@index')->with('success', 'Excluído com Sucesso!');
    }
}

