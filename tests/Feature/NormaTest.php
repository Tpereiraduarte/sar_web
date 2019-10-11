<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Norma;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NormaTest extends TestCase
{
    use DatabaseTransactions;

    public function test_cria_norma()
    {
        $norma = factory(Norma::class)->create();

        $this->assertDatabaseHas('normas',[
            'numero_norma'=> $norma->numero_norma,
            'descricao' =>  $norma->descricao,
            'usuario_alteracao' => $norma->usuario_alteracao
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
            'numero_norma'=> $norma->numero_norma,
            'descricao' =>  $norma->descricao,
            'usuario_alteracao' => $norma->usuario_alteracao
        ]);
    }

    public function test_rota_norma_index_sem_autenticacao()
    {
        $response = $this->get('norma');
        $response->assertRedirect('/');
        $response->assertStatus(302);

    }
    
    public function test_rota_norma_index_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $response = $this->actingAs($usuario)
        ->get('inicio');
        $response->assertStatus(200);
    }

    public function test_rota_norma_edit_sem_autenticacao()
    {
        $norma = factory(Norma::class)->create();
        $response = $this->get('norma/'.$norma->id_norma.'/edit');
        $response->assertStatus(302);
    }

    public function test_rota_norma_edit_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $norma = factory(Norma::class)->create();
        $response = $this->actingAs($usuario)->get('norma/'.$norma->id_norma.'/edit');
        $response->assertStatus(200);
    }

    public function test_rota_norma_create_sem_autenticacao()
    {
        $norma = factory(Norma::class)->create();
        $response = $this->get('norma/create');
        $response->assertStatus(302);
    }

    public function test_rota_norma_create_com_autenticacao()
    {
        $usuario = factory(User::class)->create();
        $norma = factory(Norma::class)->create();
        $response = $this->actingAs($usuario)->get('norma/create');
        $response->assertStatus(200);
    }

    public function test_cadastrar_norma_view()
    {
        $usuario = factory(User::class)->create();
        $response = $this->actingAs($usuario)->get('norma/create');
        
        $acao = $this->json('POST', '/norma',[
                'numero_norma'    =>  '52',
                'descricao' =>  'Nova Update',
                'usuario_alteracao' => 'Sistema modificado'
        ]);
        
        $this->assertDatabaseMissing('normas',[
            'numero_norma'    =>  '52',
            'descricao' =>  'Nova Update',
            'usuario_alteracao' => 'Sistema modificado'
        ]);
        
        $acao->assertStatus(302);
    }

    public function test_editar_norma_view()
    {
        $usuario = factory(User::class)->create();
        $norma = factory(Norma::class)->create();
        $response = $this->actingAs($usuario)->get('norma/'.$norma->id_norma.'/edit');

        $acao = $this->json('GET', 'norma/'.$norma->id_norma.'/edit',[
                'numero_norma'    =>  '52',
                'descricao' =>  'Nova Update',
                'usuario_alteracao' => 'Sistema modificado'
        ]);
        $this->assertDatabaseMissing('normas',[
            'numero_norma'    =>  '52',
            'descricao' =>  'Nova Update',
            'usuario_alteracao' => 'Sistema modificado'
        ]);
        
        $acao->assertStatus(200);
    }

    public function test_deletar_norma_view()
    {
        $usuario = factory(User::class)->create();
        $norma = factory(Norma::class)->create();        
        $response = $this->actingAs($usuario)->get('norma');

        $acao = $this->json('DELETE', 'norma/'.$norma->id_norma);
        
        $this->assertDatabaseMissing('normas',[
            'numero_norma'=> $norma->numero_norma,
            'descricao' =>  $norma->descricao,
            'usuario_alteracao' => $norma->usuario_alteracao
        ]);

        $acao->assertStatus(302);
    }
}
