<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Norma;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NormaTest extends TestCase
{
    use DatabaseTransactions;

    public function test_cria_norma()
    {
        $norma = factory(Norma::class)->create();

        $this->assertDatabaseHas('normas',[
            'numero_norma'=>'55',
            'descricao' =>  'Nova Norma',
            'usuario_alteracao'=>'Sistema'
        ]);
    }

    public function test_update_norma()
    {
        $norma = factory(Norma::class)->create();
        $norma->numero_norma = '52';
        $norma->descricao = 'Nova Update';
        $norma->usuario_alteracao = 'Sistema modificado';
        $norma->update();
        
        $this->assertDatabaseHas('normas',[
            'numero_norma'    =>  '52',
            'descricao' =>  'Nova Update',
            'usuario_alteracao' => 'Sistema modificado'
        ]);
    }

    public function test_delete_norma()
    {
        $norma = factory(Norma::class)->create();
        $norma->delete();
        
        $this->assertDatabaseMissing('normas',[
            'numero_norma'    =>  '55',
            'descricao' =>  'Nova Norma',
            'usuario_alteracao' => 'Sistema'
        ]);
    }
}
