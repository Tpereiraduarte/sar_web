<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Pergunta;
use App\Models\Checklist;
use App\Models\Formulario;
use Faker\Generator as Faker;

$factory->define(Formulario::class, function (Faker $faker) {
    $pergunta = factory(Pergunta::class)->create();
    $checklist = factory(Checklist::class)->create();
    return [
        'pergunta_id'  =>  $pergunta->id_pergunta,
        'checklist_id'  =>  $checklist->id_checklist,
        'usuario_alteracao' => $faker->name
    ];
});
