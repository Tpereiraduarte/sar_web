<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Perfil;
use App\Models\Permissao;
use App\Models\Perfilpermissao;
use Faker\Generator as Faker;

$factory->define(Perfilpermissao::class, function (Faker $faker) {
    $permissao = factory(Permissao::class)->create();
    $perfil = factory(Perfil::class)->create(); 

    return [
        'permissao_id'  =>  $permissao->id_permissao,
        'perfil_id'   =>  $perfil->id_perfil,
        'usuario_alteracao' => $faker->name
    ];
});
