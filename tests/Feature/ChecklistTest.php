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
        Checklist::create([
            'titulo'         => 'Serviço de Redes',
            'usuario_alteracao' => 'Sistema'
        ]);        
        $this->assertDatabaseHas('checklists',[
            'titulo'=>'Serviço de Redes',
            'usuario_alteracao'=>'Sistema'
        ]);
    }
}
