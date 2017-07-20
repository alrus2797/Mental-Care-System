<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('apellidopaterno',100);
            $table->string('apellidomaterno',100);
            $table->string('nombres',100);
            $table->unsignedInteger('dni');
            $table->string('sexo',1);
            $table->date('fechanacimiento');
            $table->string('direccion',200);
            $table->string('telefono',9);
            $table->string('email');
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
        Schema::dropIfExists('personas');
    }
}
