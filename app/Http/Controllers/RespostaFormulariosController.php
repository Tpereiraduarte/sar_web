<?php

namespace App\Http\Controllers;

use App\Models\RespostaFormulario;
use App\Models\Formulario;
use App\Models\Checklist;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\CollectionCollection;
use Illuminate\Support\Facades\DB;

class RespostaFormulariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = DB::table('resposta_formularios')
        ->select('ordem_servico','titulo_formulario','status')
        ->groupBy('ordem_servico','titulo_formulario','status')
        ->get();
        return view('resposta.index')->with('dados', $dados);
    }
    
    public function tiposervico()
    {
        $dados = Checklist::all();
        return view('resposta.tiposervico')->with('dados', $dados);
    }

    public function servico(Request $request)
    {
        $id_checklist = $request->checklist_id;
        $dados        = Checklist::find($id_checklist);
        $lista        = Formulario::where('checklist_id', '=', $id_checklist)->get();
        return view('resposta.store')->with('lista', $lista)->with('dados', $dados);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $perguntas = $request->pergunta;
        $valores   = $request->valor;
        $fotos     = $request->foto;
        
        for ($n=0; $n < count($perguntas); $n++) { 
            $nome[$n] = "";
        }
        
        $imagem = $request->hasFile('foto');
        $incluir = RespostaFormulario::where('ordem_servico', $request->ordem)->first();
        if($imagem) {
            foreach ($fotos as $key => $value) {
                $extensao = $value->getMimeType();
                $nome[$key] = $value->getClientOriginalName();
                $upload = $value->storeAs('fotos',$nome[$key]);
            }
        }

        if (is_null($incluir)) {
            $status = "Concluido";
            
            for ($j = 0; $j < count($valores); $j++) {
                if (strcmp($valores[$j], "N") == 0) {
                    $status = "Indeferido";
                }
            }

            for ($i = 0; $i < count($perguntas); $i++) {
                $dados                    = new RespostaFormulario();
                $dados->ordem_servico     = $request->ordem;
                $dados->titulo_formulario = $request->titulo;
                $dados->pergunta          = $perguntas[$i];
                $dados->valor             = $valores[$i];
                $dados->localizacao       = $request->geocalizacao;
                $dados->imagem            = $nome[$i];
                $dados->status            = $status;
                $dados->usuario_alteracao = Auth()->user()->nome;
                //dd($dados);
                $dados->save();
            }
            return redirect()->action('RespostaFormulariosController@tiposervico')->with('success', 'Cadastrado com Sucesso!');
        } else {
            return back()->withInput()->withErrors(['resposta', 'Name is required']);
        }
    }
    
    public function confereStatus($valores)
    {
        for ($j = 0; $j < count($valores); $j++) {
            if (strcmp($valores[$j], "N") == 0) {
                $status = "Indeferido";
            } else {
                $status = "Concluído";
            }
        }
        return $status;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ordem_servico)
    {
        $dados = RespostaFormulario::where('ordem_servico','=',$ordem_servico)->get();
        return view('resposta.show')->with('dados',$dados);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}