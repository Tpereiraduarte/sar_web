<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use App\Models\Pergunta;
use App\Models\Checklist;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Mobile_Detect;


class FormulariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detect = new Mobile_Detect;
        $dados = Checklist::all();
        return view("formulario.index",compact('dados','detect'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detect = new Mobile_Detect;
        $dados = Pergunta::all();
        return view("formulario.store",compact('dados','detect'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checklist = new Checklist();
        $checklist->titulo = $request->titulo;
        $checklist->usuario_alteracao = Auth()->user()->nome;
        $checklist->save();
        $perguntas = $request->status;
        foreach($perguntas as $value){
            $dados = new Formulario();
            $dados->checklist_id = $checklist->id_checklist;
            $dados->pergunta_id = $value;
            $dados->usuario_alteracao = Auth()->user()->nome;
            $dados->save();
        }
        return redirect()->action('FormulariosController@index')->with('success', 'Cadastrado com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_checklist)
    {
        $detect = new Mobile_Detect;
        $dados = Checklist::find($id_checklist);
        $lista = Formulario::where('checklist_id','=',$id_checklist)->get();
        return view("formulario.show",compact('lista','dados','detect'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_checklist)
    {
        $detect = new Mobile_Detect;
        $perguntas = Pergunta::all();
        $dados = Checklist::find($id_checklist);
        $listas = DB::table('formularios')->where('checklist_id', '=', $id_checklist)->get();
        return view("formulario.edit",compact('listas','dados','perguntas','detect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_checklist)
    {
        $checklist = Checklist::find($id_checklist);
        $checklist->titulo = $request->titulo;
        $checklist->usuario_alteracao = Auth()->user()->nome;
        $checklist->update();
        $perguntas = $request->status;
        $formulario = Formulario::where('checklist_id','=',$id_checklist);
        $formulario->delete();
        foreach($perguntas as $value){
            $dados = new Formulario();
            $dados->checklist_id = $checklist->id_checklist;
            $dados->pergunta_id = $value;
            $dados->usuario_alteracao = Auth()->user()->nome;
            $dados->save();
        }
        return redirect()->action('FormulariosController@index')->with('success', 'Alterado com Sucesso!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_checklist)
    {
        $checklist = Checklist::find($id_checklist);
        $checklist->delete();
        $formulario = Formulario::where('checklist_id','=',$id_checklist);
        $formulario->delete();
        return redirect()->action('FormulariosController@index')->with('success', 'Excluído com Sucesso!');    }
}
