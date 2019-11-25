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
use Mobile_Detect;

class PerfilPermissaoController extends Controller
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
        $dados = Perfilpermissao::all();
        $admin = $this->admin();
        $permissoes =  $this->nome_permissoes();
        
        foreach ($admin as $value) {
        if(strcmp($value, "Administrador") == 0){
                return view("perfilpermissao.index",compact('dados','admin','permissoes','detect'));
           }
        }

        foreach ($permissoes as $value) {
            if (Gate::allows('perfilpermissao-view',$value)) {
                return view("perfilpermissao.index",compact('dados','admin','permissoes','detect'));
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
        //$perfil  = Perfil::all();
        $perfil = DB::table('perfils')->where('nome','<>','Administrador')->select('perfils.id_perfil','perfils.nome')->get();
        $permissao  = Permissao::all()->sortBy("nome");;
        $admin = $this->admin();
        $permissoes =  $this->nome_permissoes();


        foreach ($admin as $value) {
        if(strcmp($value, "Administrador") == 0){
                return view("perfilpermissao.store",compact('perfil','permissao','admin','permissoes','detect'));
           }
        }

        foreach ($permissoes as $value) {
            if (Gate::allows('perfilpermissao-create',$value)) {
                return view("perfilpermissao.store",compact('perfil','permissao','admin','permissoes','detect'));
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
        $detect = new Mobile_Detect;
        $dados = Perfilpermissao::find($id_perfilpermissao);
        $permissao = Permissao::all();
        $perfil  = Perfil::all();
        $admin = $this->admin();
        $permissoes =  $this->nome_permissoes();


        foreach ($admin as $value) {
        if(strcmp($value, "Administrador") == 0){
                return view("perfilpermissao.edit",compact('permissao','perfil','dados','admin','permissoes','detect'));
           }
        }

        foreach ($permissoes as $value) {
            if (Gate::allows('perfilpermissao-edit',$value)) {
                return view("perfilpermissao.edit",compact('permissao','perfil','dados','admin','permissoes','detect'));
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