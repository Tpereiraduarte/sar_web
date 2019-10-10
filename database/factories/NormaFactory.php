<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Norma;
use Faker\Generator as Faker;

$factory->define(Norma::class, function (Faker $faker) {
    return [
        'numero_norma'    =>  '55',
        'descricao' =>  'Nova Norma',
        'usuario_alteracao' => 'Sistema'
    ];
});
