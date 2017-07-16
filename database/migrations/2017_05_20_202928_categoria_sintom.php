<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoriaSintom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_sintomas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::table('sintomas', function($table) {
            $table->integer('categoria_id')->unsigned()->nullable();
        });

        Schema::table('sintomas', function($table) {
            $table->foreign('categoria_id')->references('id')->on('categoria_sintomas');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sintomas', function($table) {
            $table->dropColumn('categoria_id');
        });

        Schema::dropIfExists('categoria_sintomas');
    }
}
