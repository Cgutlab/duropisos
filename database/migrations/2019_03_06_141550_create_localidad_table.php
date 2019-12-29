<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localidad', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50)->nullable();
            $table->string('codigopostal',6)->nullable();
            $table->unsignedInteger('provincia_id');
            // $table->foreign('provincia_id')->/references('id')->on('provincia')->onDelete('cascade');
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
        Schema::dropIfExists('localidad');
    }
}
