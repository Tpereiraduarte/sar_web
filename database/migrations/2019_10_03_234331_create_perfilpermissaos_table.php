<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilpermissaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfilpermissaos', function (Blueprint $table) {
            $table->uuid('id_perfilpermissao');
            $table->primary('id_perfilpermissao');
            $table->uuid('permissao_id');
            $table->uuid('perfil_id');
            $table->string('usuario_alteracao');
            $table->timestamps();
        });
        Schema::table('perfilpermissaos', function (Blueprint $table) {
            $table->foreign('permissao_id')
            ->references('id_permissao')
            ->on('permissoes')
            ->onDelete('cascade');
        });
        Schema::table('perfilpermissaos', function (Blueprint $table) {
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
        Schema::dropIfExists('perfilpermissaos');
    }
}