<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaContactoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EmpresaContactos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('facebook')->nullable()->default(NULL);
            $table->string('instagram')->nullable()->default(NULL);
            $table->string('email_1')->nullable()->default(NULL);
            $table->string('email_2')->nullable()->default(NULL);
            $table->string('telefono_1')->nullable()->default(NULL);
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
        Schema::dropIfExists('EmpresaContactos');
    }
}
