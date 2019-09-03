<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('perfils')->delete();
        DB::table('normas')->delete();
        DB::table('paragrafos')->delete();
        DB::table('subparagrafos')->delete();
        $this->call([
            UsersTableSeeder::class,
            PerfilsTableSeeder::class,
            //UsuarioPerfilsTableSeeder::class,
            NormasTableSeeder::class,
            Nr10ParagrafosTableSeeder::class,
            Nr10TableSeeder::class
        ]);
    }
}
