<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use App\Models\Pergunta;
use App\Models\Checklist;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Mobile_Detect;
use Gate;



class FormulariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin(){
            $usuario = Auth()->user()->id_usuario;
             $admin = DB::table('users')->where('id_usuario','=',$usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfils', 'perfils.id_perfil', '=', 'usuarioperfils.perfil_id')
            ->select('perfils.nome')
            ->pluck('nome'); 

            return $admin;
    }
    public  function nome_permissoes(){

        $usuario = Auth()->user()->id_usuario;
        $permissoes = DB::table('users')->where('id_usuario','=',$usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->pluck('nome');  

        return $permissoes;
    }

    public function index()
    {
        $detect = new Mobile_Detect;
        $dados = Checklist::all();
        $admin = $this->admin();
        $permissoes =  $this->nome_permissoes();


        foreach ($admin as $value) {
        if(strcmp($value, "Administrador") == 0){
                return view("formulario.index",compact('dados','admin','permissoes','detect'));
           }
        }

        foreach ($permissoes as $value) {
            if (Gate::allows('formulario-view',$value)) {
                return view("formulario.index",compact('dados','admin','permissoes','detect'));
            }else{
                return redirect('inicio')->with('status', 'Você não tem acesso!');
            }     
        }  
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
        $admin = $this->admin();
        $permissoes =  $this->nome_permissoes();


        foreach ($admin as $value) {
        if(strcmp($value, "Administrador") == 0){
                return view("formulario.store",compact('dados','admin','permissoes','detect'));
           }
        }

        foreach ($permissoes as $value) {
            if (Gate::allows('formulario-create',$value)) {
                return view("formulario.store",compact('dados','admin','permissoes','detect'));
            }else{
                return redirect('inicio')->with('status', 'Você não tem acesso!');
            }     
        }
        
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
        $admin = $this->admin();
        $permissoes =  $this->nome_permissoes();


        foreach ($admin as $value) {
        if(strcmp($value, "Administrador") == 0){
                return view("formulario.show",compact('lista','dados','admin','permissoes','detect'));
           }
        }

        foreach ($permissoes as $value) {
            if (Gate::allows('formulario-show',$value)) {
                return view("formulario.show",compact('lista','dados','admin','permissoes','detect'));
            }else{
                return redirect('inicio')->with('status', 'Você não tem acesso!');
            }     
        }
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
        $admin = $this->admin();
        $permissoes =  $this->nome_permissoes();


        foreach ($admin as $value) {
        if(strcmp($value, "Administrador") == 0){
                return view("formulario.edit",compact('listas','dados','perguntas','admin','permissoes','detect'));
           }
        }

        foreach ($permissoes as $value) {
            if (Gate::allows('formulario-edit',$value)) {
               return view("formulario.edit",compact('listas','dados','perguntas','admin','permissoes','detect'));
            }else{
                return redirect('inicio')->with('status', 'Você não tem acesso!');
            }     
        }
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
