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
            $table->bigIncrements('id_paragrafo');
            $table->unsignedInteger('norma_id');
            $table->string('paragrafo',10);
            $table->string('descricao',3000);
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
        Schema::enableForeignKeyConstraints();
    }
}
