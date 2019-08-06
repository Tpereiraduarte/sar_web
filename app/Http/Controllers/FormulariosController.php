<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use App\Models\Pergunta;
use App\Models\Checklist;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FormulariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Checklist::all();
        return view('formulario.index')->with('dados',$dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados = Pergunta::all();
        return view('formulario.store')->with('dados',$dados);
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
        $checklist->usuario_alteracao = "";
        $checklist->save();
        $perguntas = $request->status;
        foreach($perguntas as $value){
            $dados = new Formulario();
            $dados->checklist_id = $checklist->id_checklist;
            $dados->pergunta_id = $value;
            $dados->usuario_alteracao = "";
            $dados->save();
        }
        return redirect()->action('FormulariosController@index')->with('messages', 'Formulário cadastrado com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_checklist)
    {
        $dados = Checklist::find($id_checklist);
        $lista = Formulario::where('checklist_id','=',$id_checklist)->get();
        return view('formulario.show')->with('lista',$lista)->with('dados',$dados);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_checklist)
    {
        $perguntas = Pergunta::all();
        $dados = Checklist::find($id_checklist);
        $listas = DB::table('formularios')->where('checklist_id', '=', $id_checklist)->get();
        return view('formulario.edit')->with('listas',$listas)->with('dados',$dados)->with('perguntas',$perguntas);
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
        $checklist->usuario_alteracao = "";
        $checklist->update();
        $perguntas = $request->status;
        foreach($perguntas as $value){
            $formulario = Formulario::where('checklist_id','=',$id_checklist);
            $formulario->pergunta_id = $value;
            $formulario->usuario_alteracao = "";
            $formulario->update();
        }
        return redirect()->action('FormulariosController@index')->with('messages', 'Formulário cadastrado com Sucesso!');
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
        return redirect()->action('FormulariosController@index')->with('message', 'Checklist excluido com Sucesso!');    }
}
