<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Checklist;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChecklistTest extends TestCase
{
    use DatabaseTransactions;

    public function test_cria_checklist()
    {
        $checklist = factory(Checklist::class)->create();

        $this->assertDatabaseHas('checklists',[
            'titulo' => $checklist->titulo,
            'usuario_alteracao' => $checklist->usuario_alteracao
        ]);
    }

    public function test_update_checklist()
    {
        $checklist = factory(Checklist::class)->create();
        $checklist->titulo = 'Serviço de Telefonia';        
        $checklist->usuario_alteracao = 'Sistema modificado';
        $checklist->update();
        
        $this->assertDatabaseHas('checklists',[
            'titulo' => 'Serviço de Telefonia',     
            'usuario_alteracao' => 'Sistema modificado'
        ]);
    }

    public function test_delete_checklist()
    {
        $checklist = factory(Checklist::class)->create();
        $checklist->delete();    
        $this->assertDatabaseMissing('checklists',[
            'titulo' => $checklist->titulo,
            'usuario_alteracao' => $checklist->usuario_alteracao
        ]);
    }

    public function test_cria_titulo_checklist()
    {
        $checklist = new Checklist();
        $checklist->titulo = 'Serviço de Saneamento';
        $this->assertEquals('Serviço de Saneamento', $checklist->titulo);
    }
}
