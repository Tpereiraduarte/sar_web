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
           'email'  =>  'teste@teste.com',
           'usuario_alteracao'  =>  'Sistema',
           'email_verified_at'  =>  null
        ]);
    }
}
