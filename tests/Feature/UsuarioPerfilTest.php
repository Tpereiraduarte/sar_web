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
        $usuario = User::create([
            'matricula' => '1111',
            'nome'  => 'Thiago',
            'password'  => bcrypt('123'),
            'email' => 'thiago@gmail.com',
            'imagem' => 'padrao.png',
            'usuario_alteracao' => 'Sistema'
        ]);

        $perfil = Perfil::create([
            'nome'         => 'Novo Perfil',
            'usuario_alteracao' => 'Sistema'
        ]);

        UsuarioPerfil::create([
            'usuario_id'  =>  $usuario->id_usuario,
            'perfil_id'   =>  $perfil->id_perfil,
            'usuario_alteracao' => 'Sistema'
        ]); 
               
        $this->assertDatabaseHas('usuarioperfils',[
            'usuario_id'  =>  $usuario->id_usuario,
            'perfil_id'   =>  $perfil->id_perfil,
            'usuario_alteracao' => 'Sistema'
        ]); 
    }
}
