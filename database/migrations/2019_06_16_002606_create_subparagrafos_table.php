<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubParagrafosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subparagrafos', function (Blueprint $table) {
            $table->increments('id_subparagrafo');
            $table->unsignedInteger('paragrafo_id');
            $table->string('numero_paragrafo',10);
            $table->string('descricao',3000);
            $table->string('usuario_alteracao');
            $table->timestamps();
        });

        Schema::table('subparagrafos', function (Blueprint $table) {
            $table->foreign('paragrafo_id')
            ->references('id_paragrafo')
            ->on('paragrafos')
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
        Schema::dropIfExists('subparagrafos');
    }
}
