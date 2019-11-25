<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserFormRequest;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Mobile_Detect;
use Gate;

class UsersController extends Controller
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
        $dados = User::all();
        $admin = $this->admin();
        $permissoes =  $this->nome_permissoes();
        

        foreach ($admin as $value) {
        if(strcmp($value, "Administrador") == 0){
                return view("usuario.index",compact('dados','admin','permissoes','detect'));
           }
        }


        foreach ($permissoes as $value) {
            if (Gate::allows('usuario-view',$value)) {
                return view("usuario.index",compact('dados','admin','permissoes','detect'));
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
                return view("usuario.store",compact('dados','admin','permissoes','detect'));
           }
        }

        foreach ($permissoes as $value) {

            if (Gate::allows('usuario-create',$value)) {
                return view("usuario.store",compact('dados','admin','permissoes','detect'));
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
    public function store(UserFormRequest $request)
    {
        $validacao = $request->all();
        $dados = new User();
        $dados->matricula = $request->matricula;
        $dados->nome = $request->nome;
        $dados->password = bcrypt($request['password']);
        $dados->email = $request->email;
        if($request->foto != null){
            if($request->hasFile('foto')){
                $dados->imagem = $request->foto;
                $extensao = $dados->imagem->getMimeType();
                $nome = time(). '.' .$dados->imagem->getClientOriginalName();
                $upload = $dados->imagem->storeAs('fotos_usuarios',$nome);
            }    
        }
        $dados->remember_token = bcrypt($request['password']);  
        $dados->usuario_alteracao = Auth()->user()->nome;
        $dados->save();
        return redirect()->action('UsersController@index')->with('success', 'Cadastrado com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_usuario)
    {
        return view('usuario.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_usuario)
    {
        $detect = new Mobile_Detect;
        $dados = User::find($id_usuario);
        $admin = $this->admin();
        $permissoes =  $this->nome_permissoes();

        foreach ($admin as $value) {
        if(strcmp($value, "Administrador") == 0){
               return view("usuario.edit",compact('dados','admin','permissoes','detect'));
           }
        }

        foreach ($permissoes as $value) {
            if (Gate::allows('usuario-edit',$value)) {

                return view("usuario.edit",compact('dados','admin','permissoes','detect'));

            }elseif (Gate::allows('usuario-edit-perfil',$value)) { 
                
                return view("usuario.edit",compact('dados','admin','permissoes','detect'));

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
    public function update(Request $request, $id_usuario)
    {
        $detect = new Mobile_Detect;
        $dados = User::find($id_usuario);
        $dados->matricula = $request->matricula;
        $dados->nome = $request->nome;
        $dados->usuario_alteracao = Auth()->user()->nome;
        if ($request->password != ''){
            $dados->password = bcrypt($request['password']);
        }
        
        if($request->foto != null){
            if($request->hasFile('foto')){
                $dados->imagem = $request->foto;
                $extensao = $dados->imagem->getMimeType();
                $nome = time(). '.' .$dados->imagem->getClientOriginalName();
                $upload = $dados->imagem->storeAs('fotos_usuarios',$nome);
                $dados->imagem = $nome;
            }
        }
        $dados->update();
        if($detect->isMobile()){
            return redirect()->action('InicioController@index')->with('success', 'Alterado com Sucesso!')->with('detect');
        }else{
            return redirect()->action('UsersController@index')->with('success', 'Alterado com Sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_usuario)
    {
        $dados = User::find($id_usuario);
        $dados->delete();
        return redirect()->action('UsersController@index')->with('success', 'Excluído com Sucesso!');
    }
    
    public function geraPDF()
    {
        $dados = User::all()->sortBy('nome');
        return \PDF::loadView('relatorios.relatoriousuarios', compact('dados'))
            ->setPaper('a4', 'landscape')
            ->download('Relatorio_Usuario.pdf');
    }

}
