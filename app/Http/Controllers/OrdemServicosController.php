<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Checklist;
use App\Models\OrdemServico;
use App\Http\Requests\OrdemServicosFormRequest;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class OrdemServicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = OrdemServico::all();
        return view('ordemservico.index')->with('dados',$dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = User::all();
        $checklist  = Checklist::all();      
        return view('ordemservico.store')->with('usuario',$usuario)->with('checklist',$checklist);
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
        return redirect()->action('OrdemServicosController@index')->with('success', 'Cadastrado com Sucesso!');
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
        $dados = OrdemServico::find($id_ordemservico);
        $usuario = User::all();
        $checklist  = Checklist::all();      
        return view('ordemservico.edit')->with('usuario',$usuario)->with('checklist',$checklist)->with('dados', $dados);
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
}
