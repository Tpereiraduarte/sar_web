<?php
namespace App\Http\Controllers;
use App\Models\Perfilpermissao;
use App\Models\Perfil;
use App\Models\Permissao;
use App\Http\Requests\PerfilpermissaoFormRequest;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Gate;

class PerfilPermissaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $dados = Perfilpermissao::all();
        Gate::allows('usuario-view',$dados);
        return view('perfilpermissao.index')->with('dados',$dados);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $perfil  = Perfil::all();
        $permissao  = Permissao::all();
        return view('perfilpermissao.store')->with('perfil',$perfil)->with('permissao',$permissao);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(PerfilpermissaoFormRequest $request)
    {
        $validacao = $request->all();
        $dados = new Perfilpermissao();
        $dados->permissao_id = $request->permissao_id;
        $dados->perfil_id  = $request->perfil_id;
        $dados->usuario_alteracao = '';
        $dados->save();
        return redirect()->action('PerfilPermissaoController@index')->with('messages', 'Permissao criado com Sucesso!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_perfilpermissao)
    {
        return view('perfilpermissao.edit');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id_perfilpermissao)
    {
        $dados = Perfilpermissao::find($id_perfilpermissao);
        $permissao = Permissao::all();
        $perfil  = Perfil::all();
        return view('perfilpermissao.edit')->with('permissao',$permissao)->with('perfil',$perfil)->with('dados', $dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(PerfilpermissaoFormRequest $request, $id_perfilpermissao)
    {
        $validacao = $request->all();
        $dados = Perfilpermissao::find($id_perfilpermissao);
        $dados->permissao_id = $request->permissao_id;
        $dados->perfil_id  = $request->perfil_id;
        $dados->usuario_alteracao = '';
        $dados->update();
        return redirect()->action('PerfilPermissaoController@index')->with('message', 'Perfil alterado com Sucesso!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id_perfilpermissao)
    {
        $dados = Perfilpermissao::find($id_perfilpermissao);
        $dados->delete();
        return redirect()->action('PerfilPermissaoController@index')->with('message', 'Permissão excluida com Sucesso!');
    }
    public function geraPDF()
    {
        $dados = Perfilpermissao::all();
        return \PDF::loadView('relatorios.relatorioperfilpermissao', compact('dados'))
            ->setPaper('a4', 'landscape')
            ->download('Relatorio_Perfil_Permissao.pdf');
    }
}