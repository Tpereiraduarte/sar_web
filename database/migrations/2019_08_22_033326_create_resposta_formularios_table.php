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
            $table->uuid('ordemservico_id');
            $table->string('titulo_formulario');
            $table->string('pergunta');
            $table->char('valor',1);
            $table->string('localizacao')->nullable();
            $table->binary('imagem')->nullable();
            $table->string('observacao')->nullable()->default(NULL);
            $table->char('conclusao_servico',1);
            $table->string('usuario_alteracao');
            $table->timestamps();
        });

        Schema::table('resposta_formularios', function (Blueprint $table) {
            $table->foreign('ordemservico_id')
            ->references('id_ordemservico')
            ->on('ordem_servicos')
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
        Schema::dropIfExists('resposta_formularios');
    }
}
