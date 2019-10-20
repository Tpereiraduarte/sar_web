<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Perfil;
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
            'usuario_alteracao' => $usuarioperfil->usuario_alteracao
        ]); 
    }
   
    public function test_update_usuario_perfil()
    {
        $usuarioperfil = factory(UsuarioPerfil::class)->create();
        $novoperfil = factory(Perfil::class)->create();
        $usuarioperfil->perfil_id = $novoperfil->id_perfil;
        $usuarioperfil->usuario_alteracao = 'Sistema modificado';
        $usuarioperfil->update();
                
        $this->assertDatabaseHas('usuarioperfils',[
            'perfil_id' => $usuarioperfil->perfil_id,
            'usuario_alteracao' => 'Sistema modificado'
        ]);
    }

    public function test_delete_usuario_perfil()
    {
        $usuarioperfil = factory(UsuarioPerfil::class)->create();
        $usuarioperfil->delete();
        
        $this->assertDatabaseMissing('usuarioperfils',[
            'usuario_id'  =>  $usuarioperfil->usuario_id,
            'perfil_id'   =>  $usuarioperfil->perfil_id,
            'usuario_alteracao' => $usuarioperfil->usuario_alteracao
        ]);
    }
    
    public function test_rota_usuario_perfil_index_sem_autenticacao()
    {
        $response = $this->get('usuarioperfil');
        $response->assertRedirect('/');
        $response->assertStatus(302);

    }
    
    public function test_rota_usuario_perfil_index_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $response = $this->actingAs($usuario)
        ->get('inicio');
        $response->assertStatus(200);
    }

    public function test_rota_usuario_perfil_edit_sem_autenticacao()
    {
        $usuarioperfil = factory(UsuarioPerfil::class)->create();
        $response = $this->get('usuarioperfil/'.$usuarioperfil->id_usuarioperfil.'/edit');
        $response->assertStatus(302);
    }

    public function test_rota_usuario_perfil_edit_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $usuarioperfil = factory(UsuarioPerfil::class)->create();
        $response = $this->actingAs($usuario)->get('usuarioperfil/'.$usuarioperfil->id_usuarioperfil.'/edit');
        $response->assertStatus(200);
    }

    public function test_rota_usuario_perfil_create_sem_autenticacao()
    {
        $usuarioperfil = factory(UsuarioPerfil::class)->create();
        $response = $this->get('usuarioperfil/create');
        $response->assertStatus(302);
    }

    public function test_rota_usuario_perfil_create_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $usuarioperfil = factory(UsuarioPerfil::class)->create();
        $response = $this->actingAs($usuario)->get('usuarioperfil/create');
        $response->assertStatus(200);
    }

    public function test_cadastrar_usuarioperfil_view()
    {
        $usuario = factory(User::class)->create();
        $usuarioperfil = factory(UsuarioPerfil::class)->create();
        $novousuarioperfil = factory(UsuarioPerfil::class)->create();
        $response = $this->actingAs($usuario)->get('usuarioperfil/create');
        
        $acao = $this->json('POST', '/usuarioperfil',[
            'usuario_id'  =>  $usuarioperfil->usuario_id,
            'perfil_id'   =>  $novousuarioperfil->perfil_id,
            'usuario_alteracao' => $usuario->usuario_alteracao
        ]);
        
        $this->assertDatabaseMissing('usuarioperfils',[
            'usuario_id'  =>  $usuarioperfil->usuario_id,
            'perfil_id'   =>  $novousuarioperfil->perfil_id,
            'usuario_alteracao' => $usuario->usuario_alteracao
        ]);
        
        $acao->assertStatus(302);
    }

    public function test_editar_usuario_perfil_view()
    {
        $usuario = factory(User::class)->create();
        $usuarioperfil = factory(UsuarioPerfil::class)->create();
        $novoperfil = factory(Perfil::class)->create();

        $response = $this->actingAs($usuario)->get('usuarioperfil/'.$usuarioperfil->id_usuarioperfil.'/edit');

        $acao = $this->json('GET', 'usuarioperfil/'.$usuarioperfil->id_usuarioperfil.'/edit',[
                'usuario_id'    =>  $usuarioperfil->id_usuarioperfil,
                'perfil_id' =>  $novoperfil->id_perfil,
                'usuario_alteracao' => $usuario->nome
        ]);
        $this->assertDatabaseMissing('usuarioperfils',[
            'usuario_id'    =>  $usuarioperfil->id_usuarioperfil,
            'perfil_id' =>  $novoperfil->id_perfil,
            'usuario_alteracao' => $usuario->nome
        ]);
        
        $acao->assertStatus(200);
    }

    public function test_deletar_usuario_perfil_view()
    {
        $usuario = factory(User::class)->create();
        $usuarioperfil = factory(UsuarioPerfil::class)->create();        
        $response = $this->actingAs($usuario)->get('norma');

        $acao = $this->json('DELETE', 'usuarioperfil/'.$usuarioperfil->id_usuarioperfil);
        
        $this->assertDatabaseMissing('usuarioperfils',[
            'usuario_id'  =>  $usuarioperfil->usuario_id,
            'perfil_id'   =>  $usuarioperfil->perfil_id,
            'usuario_alteracao' => $usuarioperfil->usuario_alteracao
        ]);

        $acao->assertStatus(302);
    }
}
