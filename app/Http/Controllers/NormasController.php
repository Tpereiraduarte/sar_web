<?php

namespace App\Http\Controllers;

use App\Models\Norma;
use App\Http\Requests\NormasFormRequest;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NormasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Norma::all();
        return view('norma.index')->with('dados',$dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('norma.store');
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
        $dados->usuario_alteracao = "";
        $dados->save();
        return redirect()->action('NormasController@index')->with('messages', 'Norma cadastrada com Sucesso!');
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
        $dados = Norma::find($id_norma);
        return view('norma.edit')->with('dados',$dados);
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
        $dados->usuario_alteracao = "";
        $dados->update();
        return redirect()->action('NormasController@index')->with('messages', 'Norma cadastrada com Sucesso!');
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
        return redirect()->action('NormasController@index')->with('message', 'Norma excluida com Sucesso!');
    }
}
