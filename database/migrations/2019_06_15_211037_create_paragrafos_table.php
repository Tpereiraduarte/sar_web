<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParagrafosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paragrafos', function (Blueprint $table) {
            $table->uuid('id_paragrafo');
            $table->primary('id_paragrafo');
            $table->uuid('norma_id');
            $table->string('numero_paragrafo',10);
            $table->string('descricao',6000);
            $table->string('usuario_alteracao');
            $table->timestamps();
            $table->foreign('norma_id')
            ->references('id_norma')
            ->on('normas')
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
        Schema::dropIfExists('paragrafos');
    }
}
