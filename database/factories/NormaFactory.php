<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Norma;
use Faker\Generator as Faker;

$factory->define(Norma::class, function (Faker $faker) {
    return [
        'numero_norma'    =>  $faker->unique()->numberBetween($min = 50, $max = 99),
        'descricao' =>  $faker->name,
        'usuario_alteracao' => $faker->name
    ];
});
