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
        Perfil::create([
            'nome'         => 'Novo Perfil',
            'usuario_alteracao' => 'Sistema'
        ]);        
        $this->assertDatabaseHas('perfils',[
            'nome'=>'Novo Perfil',
            'usuario_alteracao'=>'Sistema'
        ]);
    }
}
