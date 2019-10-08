<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Norma;
use App\Models\Pergunta;
use App\Models\Paragrafo;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PerguntaTest extends TestCase
{
    use DatabaseTransactions;

    public function test_cria_pergunta()
    {
        $norma = Norma::create([
            'numero_norma'    =>  '55',
            'descricao' =>  'Nova Norma',
            'usuario_alteracao' => 'Sistema'
        ]);  

        $paragrafo = Paragrafo::create([
            'norma_id'  =>  $norma->id_norma,
            'numero_paragrafo'    =>  '55.1',
            'descricao' =>  'Novo Paragrafo',
            'usuario_alteracao' => 'Sistema'
        ]); 
        
        Pergunta::create([
            'norma_id'  =>  $norma->id_norma,
            'paragrafo_id'  =>  $paragrafo->id_paragrafo,
            'pergunta' =>  'Existe fios desencapados no poste?',
            'usuario_alteracao' => 'Sistema'
        ]);
        $this->assertDatabaseHas('perguntas',[
            'norma_id'  =>  $norma->id_norma,
            'paragrafo_id'  =>  $paragrafo->id_paragrafo,
            'pergunta' =>  'Existe fios desencapados no poste?',
            'usuario_alteracao' => 'Sistema'
        ]);
    }
}
