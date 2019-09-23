<?php

use Illuminate\Database\Seeder;
use App\Models\SubParagrafo;

class Nr03TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createSubParagrafos();
    }

    public function createSubParagrafos(){

        $paragrafo1 = DB::table('paragrafos')->where('numero_paragrafo','3.1')->first();
        $sub1 = $paragrafo1->id_paragrafo;
        $paragrafo1 = DB::table('paragrafos')->where('numero_paragrafo','3.2')->first();
        $sub2 = $paragrafo2->id_paragrafo;
        $paragrafo3 = DB::table('paragrafos')->where('numero_paragrafo','3.3')->first();
        $sub3 = $paragrafo3->id_paragrafo;
        $paragrafo4 = DB::table('paragrafos')->where('numero_paragrafo','3.4')->first();
        $sub4 = $paragrafo4->id_paragrafo;
        $paragrafo5 = DB::table('paragrafos')->where('numero_paragrafo','3.5')->first();
        $sub5 = $paragrafo5->id_paragrafo;

        SubParagrafo::create([
            'paragrafo_id'      => $sub1,
            'numero_paragrafo'  =>'3.1',
            'descricao'         =>'Embargo e interdição são medidas de urgência, adotadas a partir da constatação de situação de trabalho que caracterize risco grave e iminente ao trabalhador.', 'usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub1,
            'numero_paragrafo'  =>'3.1.1',
            'descricao'         =>'Considera-se grave e iminente risco toda condição ou situação de trabalho que possa causar acidente ou doença relacionada ao trabalho com lesão grave à integridade física do trabalhador.', 'usuario_alteracao' =>'Sistema']);        
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'3.2',
            'descricao'         =>'A interdição implica a paralisação total ou parcial do estabelecimento, setor de serviço, máquina ou equipamento.', 'usuario_alteracao' =>'Sistema']);
            
        SubParagrafo::create([
            'paragrafo_id'      => $sub3,
            'numero_paragrafo'  =>'3.3',
            'descricao'         =>'O embargo implica a paralisação total ou parcial da obra.', 'usuario_alteracao' =>'Sistema']);
        SubParagrafo::create([
            'paragrafo_id'      => $sub3,
            'numero_paragrafo'  =>'3.3.1',
            'descricao'         =>'Considera-se obra todo e qualquer serviço de engenharia de construção, montagem, instalação, manutenção ou reforma.', 'usuario_alteracao' =>'Sistema']);
    
        SubParagrafo::create([
            'paragrafo_id'      => $sub4,
            'numero_paragrafo'  =>'3.4',
            'descricao'         =>'Durante a vigência da interdição ou do embargo, podem ser desenvolvidas atividades necessárias à correção da situação de grave e iminente risco, desde que adotadas medidas de proteção adequadas dos trabalhadores envolvidos.', 'usuario_alteracao' =>'Sistema']);

        SubParagrafo::create([
            'paragrafo_id'      => $sub5,
            'numero_paragrafo'  =>'3.5',
            'descricao'         =>'Durante a paralisação decorrente da imposição de interdição ou embargo, os empregados devem receber os salários como se estivessem em efetivo exercício.', 'usuario_alteracao' =>'Sistema']);
        
    }
}
