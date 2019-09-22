<?php

use App\Models\Paragrafo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Nr10ParagrafosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createParagrafos();
    }
    public function createParagrafos(){

        $resultado = DB::table('normas')->where('numero_norma','02')->first();
        $norma = $resultado->id_norma;
        
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '2.1',
            'descricao'         => 'TODO ESTABELECIMENTO NOVO',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '2.2',
            'descricao'         => 'O ÓRGÃO REGIONAL DO MTB',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '2.3',
            'descricao'         => 'A EMPRESA PODERÁ ENCAMINHAR AO ÓRGÃO REGIONAL DO MT',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '2.4',
            'descricao'         => 'A EMPRESA DEVERÁ COMUNICAR E SOLICITAR A APROVAÇÃO',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '2.5',
            'descricao'         => 'É FACULTADO ÀS EMPRESAS SUBMETER À APRECIAÇÃO PRÉVIA ',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '2.6',
            'descricao'         => 'A INSPEÇÃO PRÉVIA E A DECLARAÇÃO DE INSTALAÇÕES',
            'usuario_alteracao' => 'Sistema'
        ]);
    }
}
