<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Perfil;
use Faker\Generator as Faker;

$factory->define(Perfil::class, function (Faker $faker) {
    return [
        'nome'  => $faker->name,
        'usuario_alteracao' => $faker->name
    ];
});
