<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Paragrafo;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParagrafoTest extends TestCase
{
    use DatabaseTransactions;

    public function test_cria_paragrafo()
    {
        $paragrafo = factory(Paragrafo::class)->create();

        $this->assertDatabaseHas('paragrafos',[
            'norma_id'  =>  $paragrafo->norma_id,
            'numero_paragrafo'    =>  '55.1',
            'descricao' =>  'Novo Paragrafo',
            'usuario_alteracao' => 'Sistema'
        ]);
    }

    public function test_update_paragrafo()
    {
        $paragrafo = factory(Paragrafo::class)->create();
        $paragrafo->numero_paragrafo = '55.2';
        $paragrafo->descricao = 'Novo Paragrafo';
        $paragrafo->usuario_alteracao = 'Sistema modificado';
        $paragrafo->update();
        
        $this->assertDatabaseHas('paragrafos',[
            'norma_id'  =>  $paragrafo->norma_id,
            'numero_paragrafo'    =>  '55.2',
            'descricao' =>  'Novo Paragrafo',
            'usuario_alteracao' => 'Sistema modificado'
        ]);
    }

    public function test_delete_paragrafo()
    {
        $paragrafo = factory(Paragrafo::class)->create();
        $paragrafo->delete();
        
        $this->assertDatabaseMissing('paragrafos',[
            'norma_id'  =>  $paragrafo->norma_id,
            'numero_paragrafo'    =>  '55.1',
            'descricao' =>  'Novo Paragrafo',
            'usuario_alteracao' => 'Sistema'
        ]);
    }
}
