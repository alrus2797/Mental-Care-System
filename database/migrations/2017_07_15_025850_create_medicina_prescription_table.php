<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinaPrescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicina_prescription', function (Blueprint $table) {
            //$table->increments('id');
            $table->integer('medicina_id')->unsigned();
            $table->integer('prescription_id')->unsigned();

            $table->foreign('medicina_id')->references('id')->on('medicinas');
            $table->foreign('prescription_id')->references('id')->on('prescriptions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicina_prescription');
    }
}
