<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Http\Requests\PerfilFormRequest;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Mobile_Detect;
use Gate;

class PerfilsController extends Controller
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
        $dados = Perfil::all();
        $admin = $this->admin();
        $permissoes =  $this->nome_permissoes();


        foreach ($admin as $value) {
        if(strcmp($value, "Administrador") == 0){
                return view("perfil.index",compact('dados','admin','permissoes','detect'));
           }
        }

        foreach ($permissoes as $value) {
            if (Gate::allows('perfil-view',$value)) {
                return view("perfil.index",compact('dados','admin','permissoes','detect'));
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
        $admin = $this->admin();
        $permissoes =  $this->nome_permissoes();


        foreach ($admin as $value) {
        if(strcmp($value, "Administrador") == 0){
                return view("perfil.store",compact('admin','permissoes','detect'));
           }
        }

        foreach ($permissoes as $value) {
            if (Gate::allows('perfil-create',$value)) {
                return view("perfil.store",compact('admin','permissoes','detect'));
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
    public function store(PerfilFormRequest $request)
    {
        $validacao = $request->all();
        $dados = new Perfil();
        $dados->nome = $request->nome;
        $dados->usuario_alteracao = Auth()->user()->nome;
        $dados->save();
        return redirect()->action('PerfilsController@index')->with('success', 'Cadastrado com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_perfil)
    {
        return view('perfil.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_perfil)
    {
        $detect = new Mobile_Detect;
        $dados = Perfil::find($id_perfil);
        $admin = $this->admin();
        $permissoes =  $this->nome_permissoes();


        foreach ($admin as $value) {
        if(strcmp($value, "Administrador") == 0){
                return view("perfil.edit",compact('dados','admin','permissoes','detect'));
           }
        }

        foreach ($permissoes as $value) {
           if (Gate::allows('perfil-edit',$value)) {
                return view("perfil.edit",compact('dados','admin','permissoes','detect'));
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
    public function update(PerfilFormRequest $request, $id_perfil)
    {
        $validacao = $request->all();
        $dados = Perfil::find($id_perfil);
        $dados->nome = $request->nome;
        $dados->usuario_alteracao = Auth()->user()->nome;
        $dados->update();
        return redirect()->action('PerfilsController@index')->with('success', 'Alterado com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_perfil)
    {
        $dados = Perfil::find($id_perfil);
        $dados->delete();
        return redirect()->action('PerfilsController@index')->with('success', 'Excluído com Sucesso!');
    }

    public function geraPDF()
    {
        $dados = Perfil::all()->sortBy('nome');
        return \PDF::loadView('relatorios.relatorioperfils', compact('dados'))
            ->setPaper('A4-P', 'landscape')
            ->download('Relatorio_Perfil.pdf');
    }
}
