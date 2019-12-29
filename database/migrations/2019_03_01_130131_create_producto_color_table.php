<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoColorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colorproductos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('code',10)->nullable();
            $table->string('order',3)->nullable();
            $table->string('descripcion')->nullable();
            $table->unsignedInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
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
        Schema::dropIfExists('colorproductos');
    }
}
