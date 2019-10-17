<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Perfilpermissao;
use App\Models\Usuarioperfil;
use App\Models\Permissao;
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

    	//dd($usuario);

        $permissoes = DB::table('users')->where('id_usuario','=',$usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfilpermissaos', 'perfilpermissaos.perfil_id', '=', 'usuarioperfils.perfil_id')
            ->join('permissoes', 'permissoes.id_permissao', '=', 'perfilpermissaos.permissao_id')
            ->select('permissoes.nome')
            ->get();


    	//Gate::allows('usuario-view',$permissao);
    	//dd($permissao);
    	return view('iniciomobile')->with('detect',$detect);

           //return view('iniciomobile',compact('permissoes'));
    }
 }
