<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable()->default(NULL);
            $table->string('tipo',20)->nullable()->default(NULL);
            $table->string('texto')->nullable()->default(NULL);
            $table->string('order',3)->nullable();
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
        Schema::dropIfExists('Sliders');
    }
}
