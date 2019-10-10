<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Norma;
use App\Models\Paragrafo;
use Faker\Generator as Faker;

$factory->define(Paragrafo::class, function (Faker $faker) {
    $norma = Norma::create([
        'numero_norma'    =>  '55',
        'descricao' =>  'Nova Norma',
        'usuario_alteracao' => 'Sistema'
    ]); 
    return [
        'norma_id'  =>  $norma->id_norma,
        'numero_paragrafo'    =>  '55.1',
        'descricao' =>  'Novo Paragrafo',
        'usuario_alteracao' => 'Sistema'
    ];
});
