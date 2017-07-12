<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicinas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');

            $table->integer('presentacion_id')->unsigned();
            $table->integer('medicamento_id')->unsigned();

            $table->foreign('presentacion_id')->references('id')->on('presentacions');
            $table->foreign('medicamento_id')->references('id')->on('medicamentos');



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
        Schema::dropIfExists('medicinas');
    }
}
