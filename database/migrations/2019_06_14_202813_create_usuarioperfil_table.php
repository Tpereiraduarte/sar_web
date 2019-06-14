<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioperfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarioperfil', function (Blueprint $table) {
            $table->bigIncrements('id_usuarioperfil');
            $table->integer('usuario_id');
            $table->integer('perfil_id');
            $table->string('usuarioalteracao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarioperfil');
    }
}
