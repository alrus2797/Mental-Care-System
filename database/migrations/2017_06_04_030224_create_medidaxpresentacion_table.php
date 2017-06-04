<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedidaxpresentacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medidaxpresentacion', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('id_medida')->unsigned();
            $table->integer('id_presentacion')->unsigned();

            $table->foreign('id_medida')->references('id')->on('medidas');
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
        Schema::dropIfExists('medidaxpresentacion');
    }
}
