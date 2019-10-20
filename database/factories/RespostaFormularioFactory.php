<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\OrdemServico;
use App\Models\RespostaFormulario;
use Faker\Generator as Faker;

$factory->define(RespostaFormulario::class, function (Faker $faker) {
    $ordemservico = factory(OrdemServico::class)->create();
    return [
        'titulo_formulario'  => $faker->name,
        'ordemservico_id'  => $ordemservico->id_ordemservico,
        'pergunta' => $faker->name,
        'valor' =>  'S',
        'localizacao'   =>  $faker->name,
        'imagem'    =>  'imagem.jpg',
        'observacao'    =>  $faker->name,
        'conclusao_servico'    =>  'S',
        'usuario_alteracao' => $faker->name
    ];
});
