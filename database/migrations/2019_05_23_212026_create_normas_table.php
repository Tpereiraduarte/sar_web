<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNormasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('normas', function (Blueprint $table) {
            $table->bigIncrements('id_norma');
            $table->string('numero_norma',2);
            $table->string('paragrafo',15);
            $table->string('descricao',400);
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
        Schema::dropIfExists('normas');
    }
}
