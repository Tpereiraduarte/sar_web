<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\UsuarioPerfil;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsuarioPerfilTest extends TestCase
{
    use DatabaseTransactions;

    public function test_cria_usuario_perfil()
    {
        $usuarioperfil = factory(UsuarioPerfil::class)->create();

        $this->assertDatabaseHas('usuarioperfils',[
            'usuario_id'  =>  $usuarioperfil->usuario_id,
            'perfil_id'   =>  $usuarioperfil->perfil_id,
            'usuario_alteracao' => 'Sistema'
        ]); 
    }
   
    public function test_update_usuario_perfil()
    {
        // $usuarioperfil = factory(UsuarioPerfil::class)->create();
        // $usuarioperfil->perfil_id = '64ba55f6-b3b3-4f06-9ae4-edad2079e1d0';
        // $usuarioperfil->usuario_alteracao = 'Sistema modificado';
        // $usuarioperfil->update();
        
        // $this->assertDatabaseHas('usuarioperfils',[
        //     'perfil_id' => '64ba55f6-b3b3-4f06-9ae4-edad2079e1d0',
        //     'usuario_alteracao' => 'Sistema modificado'
        // ]);
    }

    public function test_delete_usuario_perfil()
    {
        $usuarioperfil = factory(UsuarioPerfil::class)->create();
        $usuarioperfil->delete();
        
        $this->assertDatabaseMissing('usuarioperfils',[
            'usuario_id'  =>  $usuarioperfil->usuario_id,
            'perfil_id'   =>  $usuarioperfil->perfil_id,
            'usuario_alteracao' => 'Sistema'
        ]); 
    }
}
