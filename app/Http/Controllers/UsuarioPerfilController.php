<?php

namespace App\Http\Controllers;

use App\Models\UsuarioPerfil;
use App\Models\Perfil;
use App\Models\User;
use App\Http\Requests\UsuarioPerfilFormRequest;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Mobile_Detect;
use Gate;

class UsuarioPerfilController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public  function useradmin(){
            $useradmin = DB::table('usuarioperfils')->count();
            if($useradmin == 0){

              return $admin = ["Administrador"];  

            }else{
                $usuario = Auth()->user()->id_usuario;
                $admin = DB::table('users')->where('id_usuario','=',$usuario)
            ->join('usuarioperfils','usuarioperfils.usuario_id', '=','users.id_usuario')
            ->join('perfils', 'perfils.id_perfil', '=', 'usuarioperfils.perfil_id')
            ->select('perfils.nome')
            ->pluck('nome'); 
                return $admin;
            }
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
        $dados = UsuarioPerfil::all();
        $admin = $this->useradmin();
        $permissoes =  $this->nome_permissoes();


        foreach ($admin as $value) {
        if(strcmp($value, "Administrador") == 0){
                return view("usuarioperfil.index",compact('dados','admin','permissoes','detect'));
           }
        }

        foreach ($permissoes as $value) {
            if (Gate::allows('usuarioperfil-view',$value)) {
                return view("usuarioperfil.index",compact('dados','admin','permissoes','detect'));
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
        $usuario = User::all();
        $perfil  = Perfil::all(); 
        $admin = $this->useradmin();
        $permissoes =  $this->nome_permissoes();


        foreach ($admin as $value) {
        if(strcmp($value, "Administrador") == 0){
                return view("usuarioperfil.store",compact('usuario','perfil','admin','permissoes','detect'));
           }
        }

        foreach ($permissoes as $value) {
            if (Gate::allows('usuarioperfil-create',$value)) {
                return view("usuarioperfil.store",compact('usuario','perfil','admin','permissoes','detect'));
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

    public function store(UsuarioPerfilFormRequest $request)
    {
        $detect = new Mobile_Detect;
        $validacao = $request->all();
        $dados = new UsuarioPerfil();
        $dados->usuario_id = $request->usuario_id;
        $dados->perfil_id  = $request->perfil_id;
        $dados->usuario_alteracao = Auth()->user()->nome;
        $dados->save();
        return redirect()->action('UsuarioPerfilController@index')->with('success', 'Cadastrado com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_usuarioperfil)
    {
        return view('usuarioperfil.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_usuarioperfil)
    {        
        $detect = new Mobile_Detect;
        $dados = UsuarioPerfil::find($id_usuarioperfil);
        $usuario = User::all();
        $perfil  = Perfil::all();  
        $admin = $this->admin();
        $permissoes =  $this->nome_permissoes();


        foreach ($admin as $value) {
        if(strcmp($value, "Administrador") == 0){
                return view("usuarioperfil.edit",compact('usuario','perfil','dados','admin','permissoes','detect'));
           }
        }

        foreach ($permissoes as $value) {
            if (Gate::allows('usuarioperfil-edit',$value)) {
                return view("usuarioperfil.edit",compact('usuario','perfil','dados','admin','permissoes','detect'));
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
    public function update(UsuarioPerfilFormRequest $request, $id_usuarioperfil)
    {
        $validacao = $request->all();
        $dados = UsuarioPerfil::find($id_usuarioperfil);
        $dados->usuario_id = $request->usuario_id;
        $dados->perfil_id  = $request->perfil_id;
        $dados->usuario_alteracao = Auth()->user()->nome;
        $dados->update();
        return redirect()->action('UsuarioPerfilController@index')->with('success', 'Alterado com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_usuarioperfil)
    {
        $dados = UsuarioPerfil::find($id_usuarioperfil);
        $dados->delete();
        return redirect()->action('UsuarioPerfilController@index')->with('success', 'Excluído com Sucesso!');
    }

    public function geraPDF()
    {
        $dados = UsuarioPerfil::all()->sortBy('usuario_id');
        return \PDF::loadView('relatorios.relatoriousuarioperfil', compact('dados'))
            ->setPaper('a4', 'landscape')
            ->download('Relatorio_Usuario_Perfil.pdf');
    }

}