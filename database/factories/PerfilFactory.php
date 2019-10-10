<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Perfil;
use Faker\Generator as Faker;

$factory->define(Perfil::class, function (Faker $faker) {
    return [
        'nome'  => 'Novo Perfil',
        'usuario_alteracao' => 'Sistema'
    ];
});
