<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Perfilpermissao;
use App\Models\Usuarioperfil;
use App\Models\Permissao;
use App\Models\Inicio;
use Illuminate\Database\Eloquent\CollectionCollection;
use Gate;
use Illuminate\Support\Facades\DB;
use Mobile_Detect;


class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

         $detect = new Mobile_Detect;

        //$permissao = Perfilpermissao::all();
    	//dd($permissao);

        $usuario = Auth()->user()->id_usuario;
        $formularios = DB::table('formularios')->count();
        $respostas = DB::table('resposta_formularios')->count();

    	//dd($usuario);

        $permissoes = DB::table('users')->where('id_usuario','=',$usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->get();


    	//Gate::allows('usuario-view',$permissao);
    	//dd($permissao);
    	//return view('inicio')->with('Permissao',$permissoes);
        $ordempendente = $this->ordemServicosPendentes();
        $ordemrealizado = $this->ordemServicosRealizados();
        $quantidadeordemservico = $this->quantidadeOrdemServico();

        if ($detect->isMobile()){
            return view('iniciomobile')->with('detect',$detect);
        }else{           
            return view('inicio')
            ->with('quantidadeordemservico',$quantidadeordemservico)
            ->with('ordempendente',$ordempendente)
            ->with('ordemrealizado',$ordemrealizado)
            ->with('detect',$detect);
        }
    }

    public function quantidadeOrdemServico(){
        $pendente = DB::table('ordem_servicos')
        ->select(DB::raw('count(status) as pendente'))->where('status','P')->get();
    
        $finalizado = DB::table('ordem_servicos')
        ->select(DB::raw('count(status) as finalizado'))->where('status','F')->get();
    
        $cancelado = DB::table('ordem_servicos')
        ->select(DB::raw('count(status) as cancelado'))->where('status','C')->get();
        
        return [$pendente, $finalizado, $cancelado];
    }

    public function ordemServicosPendentes(){
        $dados = DB::table('ordem_servicos')
        ->join('checklists','ordem_servicos.checklist_id','=','checklists.id_checklist')
        ->select('ordem_servicos.numero_ordem_servico',
                'ordem_servicos.status',
                'checklists.titulo')
        ->where('status','P')->take(5)->get();        
        return $dados;
    }

    public function ordemServicosRealizados(){
        $dados = DB::table('ordem_servicos')
        ->join('resposta_formularios','ordem_servicos.id_ordemservico','=','resposta_formularios.ordemservico_id')
        ->select('ordem_servicos.numero_ordem_servico',
                'ordem_servicos.status',
                'resposta_formularios.titulo_formulario as titulo')
        ->distinct()
        ->where('status','<>','P')->take(5)->get();
        return $dados;
    }
}