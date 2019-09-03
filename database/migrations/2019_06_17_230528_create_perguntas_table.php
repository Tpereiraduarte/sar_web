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
            $table->uuid('id_pergunta');
            $table->primary('id_pergunta');
            $table->uuid('norma_id');
            $table->uuid('paragrafo_id');
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
