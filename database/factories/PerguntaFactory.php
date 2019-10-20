<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Norma;
use App\Models\Pergunta;
use App\Models\Paragrafo;
use Faker\Generator as Faker;

$factory->define(Pergunta::class, function (Faker $faker) {
    $norma = factory(Norma::class)->create();
    $paragrafo = factory(Paragrafo::class)->create();
    return [
        'norma_id'  =>  $norma->id_norma,
        'paragrafo_id'  =>  $paragrafo->id_paragrafo,
        'pergunta' =>  $faker->name,
        'usuario_alteracao' => $faker->name
    ];
});
