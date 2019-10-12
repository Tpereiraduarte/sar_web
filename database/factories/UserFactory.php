<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'matricula' => $faker->unique()->numberBetween($min = 1, $max = 99999),
        'nome'  => $faker->name,
        'password'  => bcrypt('123'),
        'email' => $faker->unique()->safeEmail,
        'imagem' => 'padrao.png',
        'usuario_alteracao' => 'Sistema',
        'email_verified_at' => now(),
        'remember_token' => Str::random(10),

    ];
});
