<?php

use App\Models\Paragrafo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Nr06ParagrafosTableSeeder extends Seeder{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $this->createParagrafos();
    }
    public function createParagrafos(){

        $resultado = DB::table('normas')->where('numero_norma','06')->first();
        $norma = $resultado->id_norma;
        
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '6.1',
            'descricao'         => 'PARA OS FINS DE APLICAÇÃO DESTA NORMA REGULAMENTADORA',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '6.2',
            'descricao'         => 'O EQUIPAMENTO DE PROTEÇÃO INDIVIDUAL, DE FABRICAÇÃO NACIONAL OU IMPORTADO',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '6.3',
            'descricao'         => 'A EMPRESA É OBRIGADA A FORNECER AOS EMPREGADOS',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '6.4',
            'descricao'         => 'ATENDIDAS AS PECULIARIDADES DE CADA ATIVIDADE PROFISSIONAL, E OBSERVADO O DISPOSTO NO ITEM 6.3 ',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '6.5',
            'descricao'         => 'COMPETE AO SERVIÇO ESPECIALIZADO EM ENGENHARIA DE SEGURANÇA E EM MEDICINA DO TRABALHO',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '6.6',
            'descricao'         => 'RESPONSABILIDADES DO EMPREGADOR.',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '6.7',
            'descricao'         => 'RESPONSABILIDADES DO TRABALHADOR.',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '6.8',
            'descricao'         => 'RESPONSABILIDADES DE FABRICANTES E/OU IMPORTADORES.',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '6.9',
            'descricao'         => 'CERTIFICADO DE APROVAÇÃO - CA.',
            'usuario_alteracao' => 'Sistema'
        ]);
        Paragrafo::create([
            'norma_id'          => $norma, 
            'numero_paragrafo'  => '6.11',
            'descricao'         => 'DA COMPETÊNCIA DO MINISTÉRIO DO TRABALHO E EMPREGO / MTE',
            'usuario_alteracao' => 'Sistema'
        ]);
        
    } 
}
