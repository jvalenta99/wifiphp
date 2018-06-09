<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaedteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staedte', function (Blueprint $table) {
            $table->increments('stadt_ID');
            $table->string('stadtName');
            $table->unsignedInteger('land_FK');
            $table->foreign('land_FK')->references('land_ID')->on('laender');
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
        Schema::dropIfExists('staedte');
    }
}
