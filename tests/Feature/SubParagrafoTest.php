<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Norma;
use App\Models\Paragrafo;
use App\Models\SubParagrafo;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubParagrafoTest extends TestCase
{
    use DatabaseTransactions;

    public function test_cria_sub_paragrafo()
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
        
        $subparagrafo = SubParagrafo::create([
            'paragrafo_id'  =>  $paragrafo->id_paragrafo,
            'numero_paragrafo'    =>  '55.1.1',
            'descricao' =>  'Novo SubParagrafo',
            'usuario_alteracao' => 'Sistema'
        ]); 
        $this->assertDatabaseHas('subparagrafos',[
            'paragrafo_id'  =>  $paragrafo->id_paragrafo,
            'numero_paragrafo'    =>  '55.1.1',
            'descricao' =>  'Novo SubParagrafo',
            'usuario_alteracao' => 'Sistema'
        ]);
    }
}
