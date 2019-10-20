<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\User;
use App\Models\Checklist;
use App\Models\OrdemServico;
use Faker\Generator as Faker;

$factory->define(OrdemServico::class, function (Faker $faker) {
    $usuario = factory(User::class)->create();
    $checklist = factory(Checklist::class)->create();
    return [
        'numero_ordem_servico' => $faker->unique()->numberBetween($min =1, $max = 9999),
        'usuario_id'  =>  $usuario->id_usuario,
        'checklist_id'  =>  $checklist->id_checklist,
        'usuario_alteracao' => $faker->name
    ];
});
