<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresentacionxmedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presentacionxmedicamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre', 30);
            $table->string('descripcion');
            $table->integer('id_medicamento')->unsigned();
            $table->integer('id_presentacion')->unsigned();

            $table->foreign('id_medicamento')->references('id')->on('medicamentos');
            $table->foreign('id_presentacion')->references('id')->on('presentaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presentacionxmedicamentos');
    }
}
