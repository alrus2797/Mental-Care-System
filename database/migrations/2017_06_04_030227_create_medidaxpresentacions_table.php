<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedidaxpresentacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medidaxpresentacions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('id_medida')->unsigned();
            $table->integer('id_modelo_presentacion')->unsigned();

            $table->foreign('id_medida')->references('id')->on('medidas');
            $table->foreign('id_modelo_presentacion')->references('id')->on('modelo_presentacions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medidaxpresentacions');
    }
}
