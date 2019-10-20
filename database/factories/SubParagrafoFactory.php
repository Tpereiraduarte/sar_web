<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use App\Models\Norma;
use App\Models\Paragrafo;
use App\Models\SubParagrafo;
use Faker\Generator as Faker;

$factory->define(SubParagrafo::class, function (Faker $faker) {
    $norma = factory(Norma::class)->create();
    $paragrafo = factory(Paragrafo::class)->create();
    return [
        'paragrafo_id'  =>  $paragrafo->id_paragrafo,
        'numero_paragrafo'    =>  $faker->unique()->numberBetween($min = 50, $max = 99999),
        'descricao' =>  $faker->name,
        'usuario_alteracao' => $faker->name
    ];
});
