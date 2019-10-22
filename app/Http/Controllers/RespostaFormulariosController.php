<?php

namespace App\Http\Controllers;

use App\Models\RespostaFormulario;
use App\Models\Formulario;
use App\Models\Checklist;
use App\Models\OrdemServico;
use App\Models\Norma;
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
                    'resposta_formularios.conclusao_servico',
                    'resposta_formularios.created_at')
            ->distinct()
            ->orderBy('ordem_servicos.numero_ordem_servico', 'asc')
            ->get();
        return view("resposta.index",compact('dados','detect'));
    }
    
    public function tiposervico()
    {
        $detect = new Mobile_Detect;
        $id_usuario = Auth()->user()->id_usuario;
        $dados = DB::table('ordem_servicos')
        ->where('usuario_id',$id_usuario)
        ->where('status','P')
        ->select('id_ordemservico','numero_ordem_servico')
        ->orderBy('numero_ordem_servico', 'asc')
        ->get();
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
        return view("resposta.store",compact('lista','dados','numero_ordemservico','id_ordemservico','detect'));
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
        $nome   = $this->separaDadosImagem($fotos, $imagem, $perguntas);
        
        $ordemservico = $this->alteraStatusOrdemServico(
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
            $dados->observacao        = $request->observacao;
            $dados->conclusao_servico = $request->conclusao_servico;
            $dados->usuario_alteracao = Auth()->user()->nome;
            //dd($dados);
            $dados->save();
        }
        return redirect()->action('RespostaFormulariosController@tiposervico')->with('success', 'Cadastrado com Sucesso!');
    }

    public function separaDadosImagem($fotos, $imagem, $perguntas){      
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

    public function alteraStatusOrdemServico($reposta,$id_ordemservico){      
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
        $ordemservico = OrdemServico::where('id_ordemservico','=',$ordemservico_id)->get();
        return view("resposta.show",compact('dados','ordemservico','detect'));
    }

    public function historico()
    {
        $detect = new Mobile_Detect;
        $id_usuario = Auth()->user()->id_usuario;
        $dados = DB::table('resposta_formularios')
            ->join('ordem_servicos','resposta_formularios.ordemservico_id','=','ordem_servicos.id_ordemservico')
            ->where('ordem_servicos.usuario_id',$id_usuario)
            ->select('resposta_formularios.titulo_formulario',
                    'ordem_servicos.numero_ordem_servico',
                    'ordem_servicos.status',
                    'resposta_formularios.created_at')
            ->distinct()
            ->orderBy('ordem_servicos.numero_ordem_servico', 'asc')
            ->get();
        return view("resposta.historico",compact('dados','detect'));
    }

    public function normasmobile()
    {
        $detect = new Mobile_Detect;
        $dados = Norma::all()->sortBy("numero_norma");
        return view("resposta.normasmobile",compact('dados','detect'));
    }

    public function relatoriomobile(Request $request){
        $id_norma = $request->id_norma;
        $dados = DB::table('normas')
        ->join('paragrafos','normas.id_norma','=','paragrafos.norma_id')
        ->join('subparagrafos','paragrafos.id_paragrafo','=','subparagrafos.paragrafo_id')
        ->select('normas.numero_norma',
                'normas.descricao as descricao_norma',
                'paragrafos.numero_paragrafo as numero_paragrafo',
                'paragrafos.descricao as descricao_paragrafo',
                'subparagrafos.numero_paragrafo as numero_subparagrafo',
                'subparagrafos.descricao as descricao_subparagrafo')
        ->where('normas.id_norma', $id_norma)
        ->orderBy('normas.numero_norma', 'asc')
        ->orderBy('paragrafos.numero_paragrafo', 'asc')
        ->orderBy('subparagrafos.numero_paragrafo', 'asc')
        ->get();
        return \PDF::loadView('resposta.relatoriomobile', compact('dados'))
        ->setPaper('a4', 'landscape')
        ->download('Relatorio_Norma.pdf');
    } 
}