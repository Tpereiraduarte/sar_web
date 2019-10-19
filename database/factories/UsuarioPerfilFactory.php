<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\User;
use App\Models\Perfil;
use App\Models\UsuarioPerfil;
use Faker\Generator as Faker;

$factory->define(UsuarioPerfil::class, function (Faker $faker) {
    $usuario = factory(User::class)->create();
    $perfil = factory(Perfil::class)->create();
 
    return [
        'usuario_id'  =>  $usuario->id_usuario,
        'perfil_id'   =>  $perfil->id_perfil,
        'usuario_alteracao' => $faker->name
    ];
});
