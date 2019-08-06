<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormulariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formularios', function (Blueprint $table) {
            $table->increments('id_formulario');
            $table->unsignedInteger('pergunta_id');
            $table->unsignedInteger('checklist_id');
            $table->string('usuario_alteracao');
            $table->timestamps();
        });

        Schema::table('formularios', function (Blueprint $table) {
            $table->foreign('pergunta_id')
            ->references('id_pergunta')
            ->on('perguntas')
            ->onDelete('cascade');
        });

        Schema::table('formularios', function (Blueprint $table) {
            $table->foreign('checklist_id')
            ->references('id_checklist')
            ->on('checklists')
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
        Schema::dropIfExists('formularios');
    }
}
