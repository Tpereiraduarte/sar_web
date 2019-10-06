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
            Nr01ParagrafosTableSeeder::class,
            Nr01TableSeeder::class,
            Nr02ParagrafosTableSeeder::class,
            Nr02TableSeeder::class,
            Nr03ParagrafosTableSeeder::class,
            Nr03TableSeeder::class,
            Nr04ParagrafosTableSeeder::class,
            Nr04TableSeeder::class,
            Nr06ParagrafosTableSeeder::class,
            // Nr06TableSeeder::class,
            Nr10ParagrafosTableSeeder::class,
            Nr10TableSeeder::class,
            // NR12ParagrafosTableSeeder::class,
            // Nr12TableSeeder::class
        ]);
    }
}

