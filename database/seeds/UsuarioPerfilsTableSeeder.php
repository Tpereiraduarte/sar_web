<?php

use Illuminate\Database\Seeder;
use App\Models\UsuarioPerfil;

class UsuarioPerfilsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createUsuarioPerfil();
    }
    public function createUsuarioPerfil(){
        UsuarioPerfil::create([
           'usuario_id'   => '1',
           'perfil_id'  =>  '1',
           'usuario_alteracao'  =>  ''
        ]);
    }
}
