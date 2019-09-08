<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioperfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarioperfils', function (Blueprint $table) {
            $table->increments('id_usuarioperfil');
            $table->unsignedInteger('usuario_id');
            $table->unsignedInteger('perfil_id');
            $table->string('usuario_alteracao');
            $table->timestamps();
        });
        Schema::table('usuarioperfils', function (Blueprint $table) {
            $table->foreign('usuario_id')
            ->references('id_usuario')
            ->on('users')
            ->onDelete('cascade');
        });

        Schema::table('usuarioperfils', function (Blueprint $table) {
            $table->foreign('perfil_id')
            ->references('id_perfil')
            ->on('perfils')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarioperfils');
    }
}
