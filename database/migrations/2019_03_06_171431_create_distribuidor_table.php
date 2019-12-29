<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistribuidorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribuidores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('direccion')->nullable();
            $table->string('local')->nullable();
            $table->string('telefono')->nullable();
            $table->unsignedInteger('provincia_id');
            $table->unsignedInteger('localidad_id');
            $table->unsignedInteger('longitud');
            $table->unsignedInteger('latitud');
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
        Schema::dropIfExists('distribuidores');
    }
}
