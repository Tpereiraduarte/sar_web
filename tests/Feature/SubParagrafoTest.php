<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\SubParagrafo;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubParagrafoTest extends TestCase
{
    use DatabaseTransactions;

    public function test_cria_sub_paragrafo()
    {
        $subparagrafo = factory(SubParagrafo::class)->create();
        $this->assertDatabaseHas('subparagrafos',[
            'paragrafo_id'  =>  $subparagrafo->paragrafo_id,
            'numero_paragrafo'    =>  '55.1.1',
            'descricao' =>  'Novo SubParagrafo',
            'usuario_alteracao' => 'Sistema'
        ]);
    }


    public function test_update_paragrafo()
    {
        $subparagrafo = factory(SubParagrafo::class)->create();
        $subparagrafo->numero_paragrafo = '55.2.2';
        $subparagrafo->descricao = 'Alterando SubParagrafo';
        $subparagrafo->usuario_alteracao = 'Sistema modificado';
        $subparagrafo->update();
        
        $this->assertDatabaseHas('subparagrafos',[
            'paragrafo_id'  =>  $subparagrafo->paragrafo_id,
            'numero_paragrafo'    =>  '55.2.2',
            'descricao' =>  'Alterando SubParagrafo',
            'usuario_alteracao' => 'Sistema modificado'
        ]);
    }

    public function test_delete_paragrafo()
    {
        $subparagrafo = factory(SubParagrafo::class)->create();
        $subparagrafo->delete();
        
        $this->assertDatabaseMissing('subparagrafos',[
            'paragrafo_id'  =>  $subparagrafo->paragrafo_id,
            'numero_paragrafo'    =>  '55.1.1',
            'descricao' =>  'Novo SubParagrafo',
            'usuario_alteracao' => 'Sistema'
        ]);
    }
}
