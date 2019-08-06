<?php

use Illuminate\Database\Seeder;
use App\Models\Paragrafo;

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
        Paragrafo::create([
            'norma_id'          => '1', 
            'numero_paragrafo'  => '10.1',
            'descricao'         => 'OBJETIVO E CAMPO DE APLICAÇÃO',
            'usuario_alteracao' => ''
        ]);
        
        Paragrafo::create([
            'norma_id'          => '1', 
            'numero_paragrafo'  => '10.2',
            'descricao'         => 'MEDIDAS DE CONTROLE',
            'usuario_alteracao' => ''
        ]);

        Paragrafo::create([
            'norma_id'          => '1', 
            'numero_paragrafo'  => '10.2.8',
            'descricao'         => 'MEDIDAS DE PROTEÇÃO COLETIVA',
            'usuario_alteracao' => ''
        ]);

        Paragrafo::create([
            'norma_id'          => '1', 
            'numero_paragrafo'  => '10.2.9',
            'descricao'         => 'MEDIDAS DE PROTEÇÃO INDIVIDUAL',
            'usuario_alteracao' => ''
        ]);
        Paragrafo::create([
            'norma_id'          => '1', 
            'numero_paragrafo'  => '10.3',
            'descricao'         => 'SEGURANÇA EM PROJETOS',
            'usuario_alteracao' => ''
        ]);
        
        Paragrafo::create([
            'norma_id'          => '1', 
            'numero_paragrafo'  => '10.4',
            'descricao'         => 'SEGURANÇA NA CONSTRUÇÃO, MONTAGEM, OPERAÇÃO E MANUTENÇÃO',
            'usuario_alteracao' => ''
        ]);

        Paragrafo::create([
            'norma_id'          => '1', 
            'numero_paragrafo'  => '10.5',
            'descricao'         => 'SEGURANÇA EM INSTALAÇÕES ELÉTRICAS DESENERGIZADAS',
            'usuario_alteracao' => ''
        ]);

        Paragrafo::create([
            'norma_id'          => '1', 
            'numero_paragrafo'  => '10.6',
            'descricao'         => 'SEGURANÇA EM INSTALAÇÕES ELÉTRICAS ENERGIZADAS',
            'usuario_alteracao' => ''
        ]);
        Paragrafo::create([
            'norma_id'          => '1', 
            'numero_paragrafo'  => '10.7',
            'descricao'         => 'TRABALHOS ENVOLVENDO ALTA TENSÃO (AT)',
            'usuario_alteracao' => ''
        ]);
        
        Paragrafo::create([
            'norma_id'          => '1', 
            'numero_paragrafo'  => '10.8',
            'descricao'         => 'HABILITAÇÃO, QUALIFICAÇÃO, CAPACITAÇÃO E AUTORIZAÇÃO DOS TRABALHADORES',
            'usuario_alteracao' => ''
        ]);

        Paragrafo::create([
            'norma_id'          => '1', 
            'numero_paragrafo'  => '10.9',
            'descricao'         => 'PROTEÇÃO CONTRA INCÊNDIO E EXPLOSÃO',
            'usuario_alteracao' => ''
        ]);

        Paragrafo::create([
            'norma_id'          => '1', 
            'numero_paragrafo'  => '10.10',
            'descricao'         => 'SINALIZAÇÃO DE SEGURANÇA',
            'usuario_alteracao' => ''
        ]);
        Paragrafo::create([
            'norma_id'          => '1', 
            'numero_paragrafo'  => '10.11',
            'descricao'         => 'PROCEDIMENTOS DE TRABALHO',
            'usuario_alteracao' => ''
        ]);
        
        Paragrafo::create([
            'norma_id'          => '1', 
            'numero_paragrafo'  => '10.12',
            'descricao'         => 'SITUAÇÃO DE EMERGÊNCIA',
            'usuario_alteracao' => ''
        ]);

        Paragrafo::create([
            'norma_id'          => '1', 
            'numero_paragrafo'  => '10.13',
            'descricao'         => 'RESPONSABILIDADES',
            'usuario_alteracao' => ''
        ]);

        Paragrafo::create([
            'norma_id'          => '1', 
            'numero_paragrafo'  => '10.14',
            'descricao'         => 'DISPOSIÇÕES FINAIS',
            'usuario_alteracao' => ''
        ]);
    }
}
