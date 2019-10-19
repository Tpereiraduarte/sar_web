<?php

namespace App\Http\Controllers;

use App\Models\RespostaFormulario;
use App\Models\Formulario;
use App\Models\Checklist;
use App\Models\OrdemServico;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;
use Mobile_Detect; 

class RespostaFormulariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detect = new Mobile_Detect;
        $dados = DB::table('resposta_formularios')
            ->join('ordem_servicos','resposta_formularios.ordemservico_id','=','ordem_servicos.id_ordemservico')
            ->select('resposta_formularios.ordemservico_id',
                    'resposta_formularios.titulo_formulario',
                    'ordem_servicos.numero_ordem_servico',
                    'resposta_formularios.conclusao_servico')
            ->distinct()
            ->orderBy('ordem_servicos.numero_ordem_servico', 'asc')
            ->get();
        return view("resposta.index",compact('dados','detect'));
    }
    
    public function tiposervico()
    {
        $detect = new Mobile_Detect;
        $id_usuario = Auth()->user()->id_usuario;
        $resposta = DB::table('resposta_formularios')->count();
        if($resposta > 0){
            $id_usuario = Auth()->user()->id_usuario;
            $dados = DB::table('ordem_servicos')
            ->join('resposta_formularios','ordem_servicos.id_ordemservico','<>','resposta_formularios.ordemservico_id')
            ->where('ordem_servicos.usuario_id',$id_usuario)
            ->select('ordem_servicos.id_ordemservico','ordem_servicos.numero_ordem_servico')
            ->distinct()
            ->orderBy('ordem_servicos.numero_ordem_servico', 'asc')
            ->get();
        }else{
            $dados = DB::table('ordem_servicos')->where('usuario_id', $id_usuario)
            ->orderBy('ordem_servicos.numero_ordem_servico', 'asc')
            ->get();
        }
        return view("resposta.tiposervico",compact('dados','detect'));   
    }

    public function servico(Request $request)
    {
        $detect = new Mobile_Detect;
        $id_ordemservico = $request->ordemservico_id;
        
        $id_checklist = DB::table('ordem_servicos')
        ->where('id_ordemservico', $id_ordemservico)
        ->select('checklist_id','numero_ordem_servico')->get();
        
        $numero_ordemservico = $id_checklist[0]->numero_ordem_servico;
        $dados        = Checklist::find($id_checklist[0]->checklist_id);
        $lista        = Formulario::where('checklist_id', '=', $id_checklist[0]->checklist_id)->get();
        return view("usuarioperfil.store",compact('lista','dados','numero_ordemservico','id_ordemservico','detect'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $perguntas = $request->pergunta;
        $valores   = $request->valor;
        $fotos     = $request->foto;
        
        $imagem = $request->hasFile('foto');
        $nome   = $this->separadadosimagem($fotos, $imagem, $perguntas);
        $status = $this->confereStatus($valores);
        
        $ordemservico = $this->alterastatusordemservico(
            $request->conclusao_servico, 
            $request->id_ordemservico
        );

        for ($i = 0; $i < count($perguntas); $i++) {
            $dados                    = new RespostaFormulario();
            $dados->ordemservico_id   = $request->id_ordemservico;
            $dados->titulo_formulario = $request->titulo;
            $dados->pergunta          = $perguntas[$i];
            $dados->valor             = $valores[$i];
            $dados->localizacao       = $request->geocalizacao;
            $dados->imagem            = $nome[$i];
            $dados->status            = $status;
            $dados->observacao        = $request->observacao;
            $dados->usuario_alteracao = Auth()->user()->nome;
            //dd($dados);
            $dados->save();
        }
        return redirect()->action('RespostaFormulariosController@tiposervico')->with('success', 'Cadastrado com Sucesso!');
    }
    
    public function confereStatus($valores)
    {
        if(in_array('N', $valores)){
            return $status = "Indeferido";
        }else{
            return $status = "Concluído";
        }
    }

    public function separadadosimagem($fotos, $imagem, $perguntas){      
        for ($n=0; $n < count($perguntas); $n++) { 
            $nome[$n] = "";
        }
        if($imagem) {
            foreach ($fotos as $key => $value) {
                $extensao = $value->getMimeType();
                $nome[$key] = $value->getClientOriginalName();
                $upload = $value->storeAs('fotos',$nome[$key]);
            }
        }
        return $nome;
    }

    public function alterastatusordemservico($reposta,$id_ordemservico){      
        if($reposta == 'S'){
            
            $dados = OrdemServico::find($id_ordemservico);
            $dados->status = 'F';
            $dados->update();
        }else{
            $dados = OrdemServico::find($id_ordemservico);
            $dados->status = 'C';
            $dados->update();
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ordemservico_id)
    {
        $detect = new Mobile_Detect;
        $dados = RespostaFormulario::where('ordemservico_id','=',$ordemservico_id)->get();
        return view("resposta.show",compact('dados','detect'));
    }
}