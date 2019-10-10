<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Perfil;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PerfilTest extends TestCase
{
    use DatabaseTransactions;

    public function test_cria_perfil()
    {
        $perfil = factory(Perfil::class)->create();
        $this->assertDatabaseHas('perfils',[
            'nome'  =>'Novo Perfil',
            'usuario_alteracao'=>'Sistema'
        ]);
    }
    
    public function test_update_perfil()
    {
        $perfil = factory(Perfil::class)->create();
        $perfil->nome = 'Perfil Alterado';
        $perfil->usuario_alteracao = 'Sistema modificado';
        $perfil->update();
        
        $this->assertDatabaseHas('perfils',[
            'nome'    =>  'Perfil Alterado',
            'usuario_alteracao' => 'Sistema modificado'
        ]);
    }

    public function test_delete_perfil()
    {
        $perfil = factory(Perfil::class)->create();
        $perfil->delete();
        
        $this->assertDatabaseMissing('perfils',[
            'nome' => 'Novo Perfil',
            'usuario_alteracao' => 'Sistema'
        ]);
    }

    public function test_cria_nome_perfil()
    {
        $perfil = new Perfil();
        $perfil->nome = 'Super Usuário';
        $this->assertEquals('Super Usuário', $perfil->nome);
    }
}
