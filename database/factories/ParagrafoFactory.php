<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Norma;
use App\Models\Paragrafo;
use Faker\Generator as Faker;

$factory->define(Paragrafo::class, function (Faker $faker) {
    $norma = Norma::create([
        'numero_norma'    =>  $faker->numberBetween($min = 50, $max = 99),
        'descricao' =>  $faker->name,
        'usuario_alteracao' => $faker->name
    ]); 
    return [
        'norma_id'  =>  $norma->id_norma,
        'numero_paragrafo'    =>  $faker->numberBetween($min = 50, $max = 999),
        'descricao' =>  $faker->name,
        'usuario_alteracao' => $faker->name
    ];
});
