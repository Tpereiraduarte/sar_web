<?php
namespace App\Http\Controllers;
use App\Models\Permissao;
use App\Http\Requests\PermissaoFormRequest;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PermissaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
         $dados = Permissao::all();
        return view('permissao.index')->with('dados',$dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
         return view('permissao.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(PermissaoFormRequest $request)
    {
        $validacao = $request->all();
        $dados = new Permissoa();
        $dados->nome = $request->nome;
        $dados->descricao = $request->descricao;
        $dados->usuario_alteracao = "";
        $dados->save();
        return redirect()->action('PermissaoController@index')->with('messages', 'Permissão criada com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id_permissao)
    {
        return view('permissao.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id_permissao)
    {
        $dados = Permissao::find($id_permissao);
        return view('permissao.edit')->with('dados',$dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(PermissaolFormRequest $request, $id_permissao)
    {
        $validacao = $request->all();
        $dados = Permissao::find($id_permissao);
        $dados->nome = $request->nome;
        $dados->descricao =$request->descricao;
        $dados->usuario_alteracao = "";
        $dados->update();
        return redirect()->action('PermissaoController@index')->with('message', 'Alterado com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id_permissao)
    {
        $dados = Permissao::find($id_permissao);
        $dados->delete();
        return redirect()->action('Permissaoontroller@index')->with('message', 'Deletado com Sucesso!');
    }
}