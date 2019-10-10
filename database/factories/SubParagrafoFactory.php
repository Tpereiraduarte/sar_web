<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use App\Models\Norma;
use App\Models\Paragrafo;
use App\Models\SubParagrafo;
use Faker\Generator as Faker;

$factory->define(SubParagrafo::class, function (Faker $faker) {
    $norma = Norma::create([
        'numero_norma'    =>  '55',
        'descricao' =>  'Nova Norma',
        'usuario_alteracao' => 'Sistema'
    ]); 

    $paragrafo = Paragrafo::create([
        'norma_id'  =>  $norma->id_norma,
        'numero_paragrafo'    =>  '55.1',
        'descricao' =>  'Novo Paragrafo',
        'usuario_alteracao' => 'Sistema'
    ]); 

    return [
        'paragrafo_id'  =>  $paragrafo->id_paragrafo,
        'numero_paragrafo'    =>  '55.1.1',
        'descricao' =>  'Novo SubParagrafo',
        'usuario_alteracao' => 'Sistema'
    ];
});
