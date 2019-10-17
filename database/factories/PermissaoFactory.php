<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Permissao;
use Faker\Generator as Faker;

$factory->define(Permissao::class, function (Faker $faker) {
    return [
        'nome'  => $faker->name,
        'descricao'  => $faker->name,
        'usuario_alteracao' => $faker->name
    ];
});
