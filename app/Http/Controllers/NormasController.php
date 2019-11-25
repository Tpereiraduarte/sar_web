<?php

namespace App\Http\Controllers;

use App\Models\Norma;
use App\Http\Requests\NormasFormRequest;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Mobile_Detect;
use Gate;

class NormasController extends Controller
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
        $dados = Norma::all();
        $admin = $this->admin();
        $permissoes =  $this->nome_permissoes();

        foreach ($admin as $value) {
        if(strcmp($value,"Administrador") == 0){
                return view("norma.index",compact('dados','admin','permissoes','detect'));
           }
        }

        foreach ($permissoes as $value) {
            if (Gate::allows('norma-view',$value)) {
                return view("norma.index",compact('dados','admin','permissoes','detect'));
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
                return view("norma.store",compact('admin','permissoes','detect'));
           }
        }

        foreach ($permissoes as $value) {
            if (Gate::allows('norma-create',$value)) {
                return view("norma.store",compact('admin','permissoes','detect'));
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
    public function store(NormasFormRequest $request)
    {
        $validacao = $request->all();
        $dados = new Norma();
        $dados->numero_norma = $request->numero_norma;
        $dados->descricao =$request->descricao;
        $dados->usuario_alteracao = Auth()->user()->nome;
        $dados->save();
        return redirect()->action('NormasController@index')->with('success', 'Cadastrado com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_norma)
    {
        return view('norma.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_norma)
    {
        $detect = new Mobile_Detect;
        $dados = Norma::find($id_norma);
        $admin = $this->admin();
        $permissoes =  $this->nome_permissoes();


        foreach ($admin as $value) {
        if(strcmp($value, "Administrador") == 0){
                return view("norma.edit",compact('dados','admin','permissoes','detect'));
           }
        }

        foreach ($permissoes as $value) {
            if (Gate::allows('norma-edit',$value)) {
                return view("norma.edit",compact('dados','admin','permissoes','detect'));
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
    public function update(NormasFormRequest $request, $id_norma)
    {
         
        $validacao = $request->all();
        $dados = Norma::find($id_norma);
        $dados->numero_norma = $request->numero_norma;
        $dados->descricao =$request->descricao;
        $dados->usuario_alteracao = Auth()->user()->nome;
        $dados->update();
        return redirect()->action('NormasController@index')->with('success', 'Alterado com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_norma)
    {
        $dados = Norma::find($id_norma);
        $dados->delete();
        return redirect()->action('NormasController@index')->with('success', 'Excluído com Sucesso!');
    }
    public function geraPDF()
    {
        $dados = Norma::all()->sortBy('numero_norma');
        return \PDF::loadView('relatorios.relatorionormas', compact('dados'))
            ->setPaper('A4-P', 'landscape')
            ->download('Relatorio_Normas.pdf');
    }


}
