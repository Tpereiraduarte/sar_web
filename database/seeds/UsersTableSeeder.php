<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createUsers();
    }
    public function createUsers(){
        User::create([
           'matricula'  =>  '1234',
           'nome'   => 'Thiago',
           'password'   =>  bcrypt('123'),
           'email'  =>  'thiago@teste.com',
           'imagem'  => 'padrao.jpg',
           'usuario_alteracao'  =>  'Sistema',
           'email_verified_at'  =>  null
        ]);
        User::create([
            'matricula'  =>  '123',
            'nome'   => 'Sanderson',
            'password'   =>  bcrypt('123'),
            'email'  =>  'sanderson@teste.com',
            'imagem'  => 'padrao.jpg',
            'usuario_alteracao'  =>  'Sistema',
            'email_verified_at'  =>  null
        ]);
        User::create([
            'matricula'  =>  '12345',
            'nome'   => 'Amanda',
            'password'   =>  bcrypt('123'),
            'email'  =>  'amanda@teste.com',
            'imagem'  => 'padrao.jpg',
            'usuario_alteracao'  =>  'Sistema',
            'email_verified_at'  =>  null
        ]);         
    }
}
