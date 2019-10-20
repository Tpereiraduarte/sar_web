<?php

namespace App\Http\Controllers;

use App\Models\RespostaFormulario;
use App\Models\Formulario;
use App\Models\Checklist;
use App\Models\OrdemServico;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;

class RespostaFormulariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        return view('resposta.index')->with('dados', $dados);
    }
    
    public function tiposervico()
    {
        $id_usuario = Auth()->user()->id_usuario;
        $dados = DB::table('ordem_servicos')
        ->where('usuario_id',$id_usuario)
        ->where('status','P')
        ->select('id_ordemservico','numero_ordem_servico')
        ->orderBy('numero_ordem_servico', 'asc')
        ->get();
        return view('resposta.tiposervico')->with('dados', $dados);    
    }

    public function servico(Request $request)
    {
        $id_ordemservico = $request->ordemservico_id;
        
        $id_checklist = DB::table('ordem_servicos')
        ->where('id_ordemservico', $id_ordemservico)
        ->select('checklist_id','numero_ordem_servico')->get();
        
        $numero_ordemservico = $id_checklist[0]->numero_ordem_servico;
        $dados        = Checklist::find($id_checklist[0]->checklist_id);
        $lista        = Formulario::where('checklist_id', '=', $id_checklist[0]->checklist_id)->get();
        return view('resposta.store')->with('lista', $lista)
                ->with('dados', $dados)
                ->with('numero_ordemservico', $numero_ordemservico)
                ->with('id_ordemservico', $id_ordemservico);
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
        $dados = RespostaFormulario::where('ordemservico_id','=',$ordemservico_id)->get();
        $ordemservico = OrdemServico::where('id_ordemservico','=',$ordemservico_id)->get();
        return view('resposta.show')->with('dados',$dados)->with('ordemservico',$ordemservico);
    }

    public function historico()
    {
        $id_usuario = Auth()->user()->id_usuario;
        $dados = DB::table('resposta_formularios')
            ->join('ordem_servicos','resposta_formularios.ordemservico_id','=','ordem_servicos.id_ordemservico')
            ->where('ordem_servicos.usuario_id',$id_usuario)
            ->select('resposta_formularios.titulo_formulario',
                    'ordem_servicos.numero_ordem_servico',
                    'resposta_formularios.created_at')
            ->distinct()
            ->orderBy('ordem_servicos.numero_ordem_servico', 'asc')
            ->get();
        return view('resposta.historico')->with('dados',$dados);
    }
}