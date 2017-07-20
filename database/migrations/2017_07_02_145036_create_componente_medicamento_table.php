<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComponenteMedicamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('componente_medicamento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('componente_id')->unsigned();
            $table->integer('medicamento_id')->unsigned();

            $table->foreign('componente_id')->references('id')->on('componentes');
            $table->foreign('medicamento_id')->references('id')->on('medicamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('componente_medicamento');
    }
}
