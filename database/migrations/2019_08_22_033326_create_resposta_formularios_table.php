<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespostaFormulariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resposta_formularios', function (Blueprint $table) {
            $table->uuid('id_reposta');
            $table->primary('id_reposta');
            $table->string('titulo_formulario');
            $table->string('ordem_servico');
            $table->string('pergunta');
            $table->char('valor',1);
            $table->string('localizacao')->nullable();
            $table->binary('imagem')->nullable();
            $table->string('status');
            $table->string('usuario_alteracao');
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
        Schema::dropIfExists('resposta_formularios');
    }
}
