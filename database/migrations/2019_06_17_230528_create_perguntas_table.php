<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perguntas', function (Blueprint $table) {
            $table->increments('id_pergunta');
            $table->unsignedInteger('norma_id');
            $table->unsignedInteger('paragrafo_id');
            $table->string('pergunta',200);
            $table->string('usuario_alteracao');
            $table->timestamps();
        });
    
        Schema::table('perguntas', function (Blueprint $table) {
            $table->foreign('norma_id')
            ->references('id_norma')
            ->on('normas')
            ->onDelete('cascade');
        });

        Schema::table('perguntas', function (Blueprint $table) {
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
        Schema::dropIfExists('perguntas');
        Schema::enableForeignKeyConstraints();
    }
}
