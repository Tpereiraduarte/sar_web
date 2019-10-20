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

           return view('inicio',compact('permissoes'))->with('formularios', $formularios);
    }
}