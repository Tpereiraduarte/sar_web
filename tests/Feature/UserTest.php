<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    use DatabaseTransactions;

    public function test_cria_usuario()
    {
        $usuario = factory(User::class)->create();
        $this->assertDatabaseHas('users',[
            'matricula' => $usuario->matricula,
            'nome'  => $usuario->nome,
            'password'  => $usuario->password,
            'email' => $usuario->email,
            'imagem' => 'padrao.png',
            'usuario_alteracao' => $usuario->usuario_alteracao,
            'email_verified_at' => $usuario->email_verified_at,
            'remember_token' => $usuario->remember_token    
        ]);
    }
    
    public function test_update_usuario()
    {
        $usuario = factory(User::class)->create();
        $usuario->nome = 'Cristian';
        $usuario->password = bcrypt('123');
        $usuario->imagem = 'padrao2.png';
        $usuario->usuario_alteracao = 'Cristian';
        $usuario->update();
        
        $this->assertDatabaseHas('users',[
            'nome'  => 'Cristian',
            'password'  => $usuario->password,
            'imagem' => 'padrao2.png',
            'usuario_alteracao' => 'Cristian'
        ]);
    }

    public function test_delete_usuario()
    {
        $usuario = factory(User::class)->create();
        $usuario->delete();
        
        $this->assertDatabaseMissing('users',[
            'matricula' => $usuario->matricula,
            'nome'  => $usuario->nome,
            'password'  => $usuario->password,
            'email' => $usuario->email,
            'imagem' => 'padrao.png',
            'usuario_alteracao' => $usuario->usuario_alteracao,
            'email_verified_at' => $usuario->email_verified_at,
            'remember_token' => $usuario->remember_token    
        ]);
    }

    public function test_rota_usuario_index_sem_autenticacao()
    {
        $response = $this->get('usuario');
        $response->assertRedirect('/');
        $response->assertStatus(302);

    }
    
    public function test_rota_usuario_index_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $response = $this->actingAs($usuario)->get('inicio');
        $response->assertStatus(200);
    }

    public function test_rota_usuario_edit_sem_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $response = $this->get('usuario/'.$usuario->id_usuario.'/edit');
        $response->assertStatus(302);
    }

    public function test_rota_usuario_edit_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $response = $this->actingAs($usuario)->get('usuario/'.$usuario->id_usuario.'/edit');
        $response->assertStatus(200);
    }

    public function test_rota_usuario_create_sem_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $response = $this->get('usuario/create');
        $response->assertStatus(302);
    }

    public function test_rota_usuario_create_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $response = $this->actingAs($usuario)->get('usuario/create');
        $response->assertStatus(200);
    }

    public function test_cadastrar_usuario_view()
    {
        $usuario = factory(User::class)->create();
        $response = $this->actingAs($usuario)->get('usuario/create');

        $acao = $this->json('POST', '/usuario',[
            'matricula' => '2567',
            'nome'  => 'Thiago',
            'password'  => '123',
            'email' => 'testeunitario@teste.com.br',
            'imagem' => 'padrao3.png',
            'usuario_alteracao' => 'Thiago',
            'remember_token' => 'dsasda'    
        ]);
        $this->assertDatabaseMissing('users',[
            'matricula' => '2567',
            'nome'  => 'Thiago',
            'password'  => '123',
            'email' => 'testeunitario@teste.com.br',
            'imagem' => 'padrao3.png',
            'usuario_alteracao' => 'Thiago',
            'remember_token' => 'dsasda'    
        ]);
        
        $acao->assertStatus(302);
    }

    public function test_editar_usuario_view()
    {
        $usuario = factory(User::class)->create();
        $response = $this->actingAs($usuario)->get('usuario/'.$usuario->id_usuario.'/edit');

        $acao = $this->json('GET', 'usuario/'.$usuario->id_usuario.'/edit',[
            'nome'  => 'Cristian',
            'password'  => $usuario->password,
            'imagem' => 'padrao2.png',
            'usuario_alteracao' => 'Cristian'
        ]);
        $this->assertDatabaseMissing('users',[
            'nome'  => 'Cristian',
            'password'  => $usuario->password,
            'imagem' => 'padrao2.png',
            'usuario_alteracao' => 'Cristian'
        ]);
        
        $acao->assertStatus(200);
    }

    public function test_deletar_usuario_view()
    {
        $usuario = factory(User::class)->create();        
        $response = $this->actingAs($usuario)->get('usuario');
        $usuarionovo = factory(User::class)->create();
        $acao = $this->json('DELETE', 'usuario/'.$usuarionovo->id_usuario);
        
        $this->assertDatabaseMissing('users',[
            'matricula' => $usuarionovo->matricula,
            'nome'  => $usuarionovo->nome,
            'password'  => $usuarionovo->password,
            'email' => $usuarionovo->email,
            'imagem' => 'padrao.png',
            'usuario_alteracao' => $usuarionovo->usuario_alteracao,
            'email_verified_at' => $usuarionovo->email_verified_at,
            'remember_token' => $usuarionovo->remember_token    
        ]);

        $acao->assertStatus(302);
    }
}
