<?php

use Illuminate\Database\Seeder;
use App\Models\SubParagrafo;

class Nr02TableSeeder extends Seeder
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

        $paragrafo1 = DB::table('paragrafos')->where('numero_paragrafo','2.1')->first();
        $sub1 = $paragrafo1->id_paragrafo;
        $paragrafo1 = DB::table('paragrafos')->where('numero_paragrafo','2.2')->first();
        $sub2 = $paragrafo2->id_paragrafo;
        $paragrafo3 = DB::table('paragrafos')->where('numero_paragrafo','2.3')->first();
        $sub3 = $paragrafo3->id_paragrafo;
        $paragrafo4 = DB::table('paragrafos')->where('numero_paragrafo','2.4')->first();
        $sub4 = $paragrafo4->id_paragrafo;
        $paragrafo5 = DB::table('paragrafos')->where('numero_paragrafo','2.5')->first();
        $sub5 = $paragrafo5->id_paragrafo;
        $paragrafo6 = DB::table('paragrafos')->where('numero_paragrafo','2.6')->first();
        $sub6 = $paragrafo6->id_paragrafo;

        SubParagrafo::create([
            'paragrafo_id'      => $sub1,
            'numero_paragrafo'  =>'2.1',
            'descricao'         =>'Todo estabelecimento novo, antes de iniciar suas atividades, deverá solicitar aprovação de suas instalações ao órgão regional do MTb.', 'usuario_alteracao' =>'Sistema']);
        
        SubParagrafo::create([
            'paragrafo_id'      => $sub2,
            'numero_paragrafo'  =>'2.2',
            'descricao'         =>'O órgão regional do MTb, após realizar a inspeção prévia, emitirá o Certificado de Aprovação de Instalações - CAI, conforme modelo anexo.', 'usuario_alteracao' =>'Sistema']);
            
        SubParagrafo::create([
            'paragrafo_id'      => $sub3,
            'numero_paragrafo'  =>'2.3',
            'descricao'         =>'A empresa poderá encaminhar ao órgão regional do MTb uma declaração das instalações do estabelecimento novo, conforme modelo anexo, que poderá ser aceita pelo referido órgão, para fins de fiscalização, quando não for possível realizar a inspeção prévia antes de o estabelecimento iniciar suas atividades.', 'usuario_alteracao' =>'Sistema']);
    
        SubParagrafo::create([
            'paragrafo_id'      => $sub4,
            'numero_paragrafo'  =>'2.4',
            'descricao'         =>'A empresa deverá comunicar e solicitar a aprovação do órgão regional do MTb, quando ocorrer modificações substanciais nas instalações e/ou nos equipamentos de seu(s) estabelecimento(s).', 'usuario_alteracao' =>'Sistema']);

        SubParagrafo::create([
            'paragrafo_id'      => $sub5,
            'numero_paragrafo'  =>'2.5',
            'descricao'         =>'É facultado às empresas submeter à apreciação prévia do órgão regional do MTb os projetos de construção e respectivas instalações.', 'usuario_alteracao' =>'Sistema']);

        SubParagrafo::create([
            'paragrafo_id'      => $sub6,
            'numero_paragrafo'  =>'2.6',
            'descricao'         =>' A inspeção prévia e a declaração de instalações, referidas nos itens 2.1 e 2.3, constituem os elementos capazes de assegurar que o novo estabelecimento inicie suas atividades livre de riscos de acidentes e/ou de doenças do trabalho, razão pela qual o estabelecimento que não atender ao disposto naqueles itens fica sujeito ao impedimento de seu funcionamento, conforme estabelece o art. 160 da CLT, até que seja cumprida a exigência deste artigo.', 'usuario_alteracao' =>'Sistema']);
    }
}
