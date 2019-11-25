<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Checklist;
use App\Models\OrdemServico;
use App\Http\Requests\OrdemServicosFormRequest;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Mobile_Detect;
use Gate;



class OrdemServicosController extends Controller
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
        $dados = OrdemServico::all();
        $admin = $this->admin();
        $permissoes =  $this->nome_permissoes();


       foreach ($admin as $value) {
        if(strcmp($value, "Administrador") == 0){
                return view("ordemservico.index",compact('dados','admin','permissoes','detect'));
           }
        }

        foreach ($permissoes as $value) {
            if (Gate::allows('ordemservico-view',$value)) {
                return view("ordemservico.index",compact('dados','admin','permissoes','detect'));
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
        $checklist  = Checklist::all();
        $admin = $this->admin();
        $permissoes =  $this->nome_permissoes();


       foreach ($admin as $value) {
        if(strcmp($value, "Administrador") == 0){
                return view("ordemservico.store",compact('usuario','checklist','admin','permissoes','detect'));
           }
        }

        foreach ($permissoes as $value) {
            if (Gate::allows('ordemservico-create',$value)) {
                return view("ordemservico.store",compact('usuario','checklist','admin','permissoes','detect'));
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
    public function store(OrdemServicosFormRequest $request)
    {
        $validacao = $request->all();
        $dados = new OrdemServico();
        $dados->numero_ordem_servico = $request->numero_ordem_servico;
        $dados->usuario_id = $request->usuario_id;
        $dados->checklist_id = $request->checklist_id;
        $dados->usuario_alteracao = Auth()->user()->nome;
        $dados->save();
        return redirect()->action('OrdemServicosController@index')->with('success', 'Serviço delegado com Sucesso!');
    }

    public function verificaOrdemServico($id_ordemservico)
    {
        $dados = OrdemServico::where('id_ordemservico',$id_ordemservico)
        ->where('status','P')->first();
        if($dados != null){
            return true;
        }    
        return false;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_ordemservico)
    {
        return view('ordemservico.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_ordemservico)
    {
        $detect = new Mobile_Detect;
        $dados = OrdemServico::find($id_ordemservico);
        $usuario = User::all();
        $checklist  = Checklist::all(); 
        $admin = $this->admin();
        $permissoes =  $this->nome_permissoes();


       foreach ($admin as $value) {
        if(strcmp($value, "Administrador") == 0){
                return view("ordemservico.edit",compact('usuario','checklist','dados','admin','permissoes','detect'));
           }
        }

        foreach ($permissoes as $value) {
            if (Gate::allows('ordemservico-edit',$value)) {
                return view("ordemservico.edit",compact('usuario','checklist','dados','admin','permissoes','detect'));
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
    public function update(Request $request, $id_ordemservico)
    {
        if($this->verificaOrdemServico($id_ordemservico)){
            $dados = OrdemServico::find($id_ordemservico);
            $dados->numero_ordem_servico = $request->numero_ordem_servico;
            $dados->usuario_id = $request->usuario_id;
            $dados->checklist_id = $request->checklist_id;
            $dados->usuario_alteracao = Auth()->user()->nome;
            $dados->update();
            return redirect()->action('OrdemServicosController@index')->with('success', 'Alterado com Sucesso!');
        }else{
            return back()
                ->withInput()
                ->withErrors(["Essa ordem de serviço já foi realizada e não pode ser editada"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ordemservico)
    {
        if($this->verificaOrdemServico($id_ordemservico)){
            $dados = OrdemServico::find($id_ordemservico);
            $dados->delete();
            return redirect()->action('OrdemServicosController@index')->with('success', 'Excluído com Sucesso!');
        }else{
            return back()
            ->withInput()
            ->withErrors(["Essa ordem de serviço já foi realizada e não pode ser deletada"]);
        }    
    }
    public function geraPDF()
    {
        $dados = OrdemServico::all()->sortBy('numero_ordem_servico');
        return \PDF::loadView('relatorios.relatorioordemservico', compact('dados'))
            ->setPaper('a4', 'landscape')
            ->download('Relatorio_OrdemServico.pdf');
    }
}
