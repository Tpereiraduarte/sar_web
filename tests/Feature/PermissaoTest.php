<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Permissao;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PermissaoTest extends TestCase
{
    use DatabaseTransactions;

    public function test_cria_permissao()
    {
        Permissao::create([
            'nome'  => 'Adiciona View',
            'descricao'  => 'Usuário pode ver essa tela',
            'usuario_alteracao' => 'Sistema'
        ]);        
        $this->assertDatabaseHas('permissoes',[
            'nome'  => 'Adiciona View',
            'descricao'  => 'Usuário pode ver essa tela',
            'usuario_alteracao' => 'Sistema'
        ]);
    }
}
