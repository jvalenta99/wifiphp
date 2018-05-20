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
            $table->integer('benut_FK');
            $table->integer('veran_FK');
            $table->integer('status_FK');
            $table->integer('bewertung');
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
