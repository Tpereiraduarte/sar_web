<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Perfilpermissao;
use App\Models\Usuarioperfil;
use App\Models\Permissao;
use Illuminate\Database\Eloquent\CollectionCollection;
use Gate;
use Illuminate\Support\Facades\DB;


class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        //$permissao = Perfilpermissao::all();
    	//dd($permissao);

    	$usuario = Auth()->user()->id_usuario;

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

        $ordemservico = $this->dadosordemservico();
        return view('inicio')->with('ordemservico',$ordemservico);
    }

    public function dadosordemservico(){
        $pendente = DB::table('ordem_servicos')
        ->select(DB::raw('count(status) as pendente'))->where('status','P')->get();
    
        $finalizado = DB::table('ordem_servicos')
        ->select(DB::raw('count(status) as finalizado'))->where('status','F')->get();
    
        $cancelado = DB::table('ordem_servicos')
        ->select(DB::raw('count(status) as cancelado'))->where('status','C')->get();
        
        return [$pendente, $finalizado, $cancelado];
    }
 }
