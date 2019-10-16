<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdemServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordem_servicos', function (Blueprint $table) {
            $table->uuid('id_ordemservico');
            $table->primary('id_ordemservico');
            $table->string('numero_ordem_servico',30)->unique();
            $table->uuid('usuario_id');
            $table->uuid('checklist_id');
            $table->char('status',1)->default('P');
            $table->string('usuario_alteracao');
            $table->timestamps();
        });

        Schema::table('ordem_servicos', function (Blueprint $table) {
            $table->foreign('usuario_id')
            ->references('id_usuario')
            ->on('users')
            ->onDelete('cascade');
        });

        Schema::table('ordem_servicos', function (Blueprint $table) {
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
        Schema::dropIfExists('ordem_servicos');
    }
}
