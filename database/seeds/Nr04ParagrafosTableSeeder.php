<?php

use App\Models\Paragrafo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Nr04ParagrafosTableSeeder extends Seeder
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

        $resultado = DB::table('normas')->where('numero_norma','10')->first();
        $norma = $resultado->id_norma;
        
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '4.1',
            'descricao'         => 'OBJETIVO E CAMPO DE APLICAÇÃO',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '4.2',
            'descricao'         => 'O DIMENSIONAMENTO DOS SERVIÇOS ESPECIALIZADOS EM ENGENHARIA DE SEGURANÇA E EM MEDICINA DO TRABALHO',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '4.3',
            'descricao'         => 'AS EMPRESAS ENQUADRADAS NO GRAU DE RISCO 1',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '4.4',
            'descricao'         => 'OS SERVIÇOS ESPECIALIZADOS EM ENGENHARIA DE SEGURANÇA E EM MEDICINA DO TRABALHO DEVEM SER COMPOSTOS POR',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '4.5',
            'descricao'         => 'A EMPRESA QUE CONTRATAR OUTRA(S) PARA PRESTAR SERVIÇOS',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '4.6',
            'descricao'         => 'OS SERVIÇOS ESPECIALIZADOS EM ENGENHARIA DE SEGURANÇA E EM MEDICINA DO TRABALHO DAS EMPRESAS QUE OPEREM EM REGIME SAZONAL',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '4.7',
            'descricao'         => 'OS SERVIÇOS ESPECIALIZADOS EM ENGENHARIA DE SEGURANÇA E EM MEDICINA DO TRABALHO DEVERÃO SER CHEFIADOS',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '4.8',
            'descricao'         => 'O TÉCNICO DE SEGURANÇA DO TRABALHO',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '4.9',
            'descricao'         => 'O ENGENHEIRO DE SEGURANÇA DO TRABALHO, O MÉDICO DO TRABALHO E O ENFERMEIRO DO TRABALHO',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '4.10',
            'descricao'         => 'AO PROFISSIONAL ESPECIALIZADO EM SEGURANÇA E EM MEDICINA DO TRABALHO',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '4.11',
            'descricao'         => 'FICARÁ POR CONTA EXCLUSIVA DO EMPREGADOR',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '4.12',
            'descricao'         => 'COMPETE AOS PROFISSIONAIS INTEGRANTES',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '4.13',
            'descricao'         => 'OS SERVIÇOS ESPECIALIZADOS EM ENGENHARIA DE SEGURANÇA E EM MEDICINA DO TRABALHO',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '4.14',
            'descricao'         => 'AS EMPRESAS CUJOS ESTABELECIMENTOS NÃO SE ENQUADREM NO QUADRO II',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '4.15',
            'descricao'         => 'AS EMPRESAS REFERIDAS NO ITEM 4.14',
            'usuario_alteracao' => 'Sistema'
        ]);

        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '4.16',
            'descricao'         => 'AS EMPRESAS CUJOS SERVIÇOS ESPECIALIZADOS EM ENGENHARIA DE SEGURANÇA E EM MEDICINA DO TRABALHO NÃO POSSUAM MÉDICO DO TRABALHO E/OU ENGENHEIRO DE SEGURANÇA DO TRABALHO', 'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '4.17',
            'descricao'         => 'OS SERVIÇOS ESPECIALIZADOS EM ENGENHARIA DE SEGURANÇA E EM MEDICINA DO TRABALHO DE QUE TRATA ESTA NR','usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '4.18',
            'descricao'         => 'OS SERVIÇOS ESPECIALIZADOS EM ENGENHARIA DE SEGURANÇA E EM MEDICINA DO TRABALHO, JÁ CONSTITUÍDOS','usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '4.19',
            'descricao'         => 'A EMPRESA É RESPONSÁVEL PELO CUMPRIMENTO DA NR',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '4.20',
            'descricao'         => 'QUANDO SE TRATAR DE EMPREITEIRAS OU EMPRESAS PRESTADORAS DE SERVIÇOS','usuario_alteracao' => 'Sistema'
        ]);
    }
}