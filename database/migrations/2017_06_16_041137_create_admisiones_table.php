<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmisionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admisiones', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->tinyInteger('facturado');
            $table->integer('paciente_id')->unsigned()->nullable()->default(NULL);
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->integer('comprobante_id')->unsigned()->nullable()->default(NULL);
            $table->foreign('comprobante_id')->references('id')->on('comprobantes');
            $table->tinyInteger('tipopago');
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
        Schema::dropIfExists('admisiones');
    }
}
