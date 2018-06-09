<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMitspielerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitspieler', function (Blueprint $table) {
            $table->increments('mitsp_ID');
            $table->unsignedInteger('benut_FK');
            $table->unsignedInteger('veran_FK');
            $table->unsignedInteger('status_FK');
            $table->unsignedInteger('bewertung');
            $table->foreign('benut_FK')->references('id')->on('users');
            $table->foreign('veran_FK')->references('veran_ID')->on('sportveranstaltungen');
            $table->foreign('status_FK')->references('stasp_ID')->on('status_spieler');
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
        Schema::dropIfExists('mitspieler');
    }
}
