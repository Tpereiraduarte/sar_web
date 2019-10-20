<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Checklist;
use Faker\Generator as Faker;

$factory->define(Checklist::class, function (Faker $faker) {
    return [
        'titulo' => $faker->name,
        'usuario_alteracao' => $faker->name
    ];
});
