<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo')->nullable()->default(NULL);
            $table->string('image')->nullable()->default(NULL);
            $table->string('name')->nullable()->default(NULL);
            $table->string('order',3)->nullable()->default(NULL);
            $table->string('url')->nullable()->default(NULL);
            $table->string('descripcion')->nullable()->default(NULL);
            $table->string('ventaja')->nullable()->default(NULL);
            $table->string('color')->nullable()->default(NULL);
            $table->string('url_mercadolibre')->nullable()->default(NULL);
            $table->string('url_mercadopago')->nullable()->default(NULL);
            $table->boolean('is_particular')->default(false);
            $table->boolean('is_profesional')->default(false);
            $table->unsignedInteger('pfamilia_id');
            $table->foreign('pfamilia_id')->references('id')->on('pfamilias')->onDelete('cascade');
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
        Schema::dropIfExists('productos');
    }
}
