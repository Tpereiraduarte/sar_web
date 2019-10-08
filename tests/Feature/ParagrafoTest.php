<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Norma;
use App\Models\Paragrafo;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParagrafoTest extends TestCase
{
    use DatabaseTransactions;

    public function test_cria_paragrafo()
    {
        $norma = Norma::create([
            'numero_norma'    =>  '55',
            'descricao' =>  'Nova Norma',
            'usuario_alteracao' => 'Sistema'
        ]); 

        Paragrafo::create([
            'norma_id'  =>  $norma->id_norma,
            'numero_paragrafo'    =>  '55.1',
            'descricao' =>  'Novo Paragrafo',
            'usuario_alteracao' => 'Sistema'
        ]); 
        $this->assertDatabaseHas('paragrafos',[
            'norma_id'  =>  $norma->id_norma,
            'numero_paragrafo'    =>  '55.1',
            'descricao' =>  'Novo Paragrafo',
            'usuario_alteracao' => 'Sistema'
        ]);
    }
}
