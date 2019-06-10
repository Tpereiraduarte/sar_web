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
        DB::table('perfils')->delete();
        DB::table('normas')->delete();
        DB::table('paragrafos')->delete();
        $this->call([
            PerfilsTableSeeder::class,
            NormasTableSeeder::class,
            Nr10TableSeeder::class
        ]);
    }
}
