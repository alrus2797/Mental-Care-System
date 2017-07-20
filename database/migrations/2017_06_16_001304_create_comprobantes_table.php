<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprobantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprobantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serie',100);
            $table->string('numero',100);
            $table->string('razonsocial',100);
            $table->string('documento',100);
            $table->string('direccion',9);
            $table->string('fecha',200);
            $table->integer('tipocomprobante_id')->unsigned()->nullable()->default(NULL);
            $table->foreign('tipocomprobante_id')->references('id')->on('tiposcomprobantes');
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
        Schema::dropIfExists('comprobantes');
    }
}
