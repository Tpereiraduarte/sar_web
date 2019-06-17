<?php

use Illuminate\Database\Seeder;
use App\Models\Perfil;

class PerfilsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createPerfils();
    }
    public function createPerfils(){
        Perfil::create([
            'nome'         => 'Administrador',
            'usuario_alteracao' => ''
        ]);
        
        Perfil::create([
            'nome'         => 'Revisor',
            'usuario_alteracao' => ''
        ]);
        
        Perfil::create([
            'nome'         => 'Usuario',
            'usuario_alteracao' => ''
        ]);

    }
}
