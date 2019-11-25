<?php
namespace App\Http\Controllers;
use App\Models\Permissao;
use App\Http\Requests\PermissaoFormRequest;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Mobile_Detect;
use Gate;

class PermissaoController extends Controller
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
        $dados = Permissao::all();
        $admin = $this->admin();
        $permissoes =  $this->nome_permissoes();


        foreach ($admin as $value) {
        if(strcmp($value, "Administrador") == 0){
                return view("permissao.index",compact('dados','admin','permissoes','detect'));
           }
        }

        foreach ($permissoes as $value) {
            if (Gate::allows('permissao-view',$value)) {
                return view("permissao.index",compact('dados','admin','permissoes','detect'));
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
                return view("permissao.store",compact('admin','permissoes','detect'));
           }
        }

        foreach ($permissoes as $value) {
            if (Gate::allows('permissao-create',$value)) {
                return view("permissao.store",compact('admin','permissoes','detect'));
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

    public function store(PermissaoFormRequest $request)
    {
        $validacao = $request->all();
        $dados = new Permissao();
        $dados->nome = $request->nome;
        $dados->descricao = $request->descricao;
        $dados->usuario_alteracao = Auth()->user()->nome;
        $dados->save();
        return redirect()->action('PermissaoController@index')->with('success', 'Cadastrado com Sucesso!');
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
        $detect = new Mobile_Detect;
        $dados = Permissao::find($id_permissao);
        $admin = $this->admin();
        $permissoes =  $this->nome_permissoes();


        foreach ($admin as $value) {
        if(strcmp($value, "Administrador") == 0){
                return view("permissao.edit",compact('dados','admin','permissoes','detect'));
           }
        }

        foreach ($permissoes as $value) {
            if (Gate::allows('permissao-edit',$value)) {
                return view("permissao.edit",compact('dados','admin','permissoes','detect'));
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

    public function update(PermissaoFormRequest $request, $id_permissao)
    {
        $validacao = $request->all();
        $dados = Permissao::find($id_permissao);
        $dados->nome = $request->nome;
        $dados->descricao =$request->descricao;
        $dados->usuario_alteracao = Auth()->user()->nome;
        $dados->update();
        return redirect()->action('PermissaoController@index')->with('success', 'Alterado com Sucesso!');
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
        return redirect()->action('PermissaoController@index')->with('success', 'Excluído com Sucesso!');
    }
    public function geraPDF()
    {
        $dados = Permissao::all()->sortBy('nome');
        return \PDF::loadView('relatorios.relatoriopermissao', compact('dados'))
            ->setPaper('a4', 'landscape')
            ->download('Relatorio_Permissao.pdf');
        }
}