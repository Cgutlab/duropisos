<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaDatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EmpresaDatos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('direccion')->nullable();
            $table->string('logo_principal')->nullable()->default(NULL);
            $table->string('logo_footer')->nullable()->default(NULL);
            $table->string('favicon')->nullable()->default(NULL);
            $table->unsignedInteger('provincia_id');
            $table->unsignedInteger('localidad_id');
            $table->unsignedInteger('longitud')->default(0);
            $table->unsignedInteger('latitud')->default(0);
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
        Schema::dropIfExists('EmpresaDatos');
    }
}
