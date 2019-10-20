<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserFormRequest;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Mobile_Detect;

class UsersController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detect = new Mobile_Detect;
        $dados = User::all();
        return view("usuario.index",compact('dados','detect'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detect = new Mobile_Detect;
        return view("usuario.store",compact('dados','detect'));
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
        return view("usuario.edit",compact('dados','detect'));
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

}
