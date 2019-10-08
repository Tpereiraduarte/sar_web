<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Norma;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NormaTest extends TestCase
{
    use DatabaseTransactions;

    public function test_cria_norma()
    {
        Norma::create([
            'numero_norma'    =>  '55',
            'descricao' =>  'Nova Norma',
            'usuario_alteracao' => 'Sistema'
        ]); 
               
        $this->assertDatabaseHas('normas',[
            'numero_norma'=>'55',
            'descricao' =>  'Nova Norma',
            'usuario_alteracao'=>'Sistema'
        ]);
    }

    public function test_update_norma()
    {
        $norma = Norma::create([
            'numero_norma'    =>  '55',
            'descricao' =>  'Nova Norma',
            'usuario_alteracao' => 'Sistema'
        ]); 
        
        $update = [
            'numero_norma'    =>  '52',
            'descricao' =>  'Nova Update',
            'usuario_alteracao' => 'Sistema modificado'
        ]; 

        $norma = Norma::find($update);
        $this->assertDatabaseHas('normas',[
            'numero_norma'    =>  '52',
            'descricao' =>  'Nova Update',
            'usuario_alteracao' => 'Sistema modificado'
        ]);
    }

    public function test_view_norma()
    {
        $response = $this->get(route(''));
        $response->assertSuccessful(); 
        $response->assertViewIs('norma.index'); 
        $response->assertViewHas('norma');    
    }
}
