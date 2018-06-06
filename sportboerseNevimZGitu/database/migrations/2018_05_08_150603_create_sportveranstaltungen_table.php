<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSportveranstaltungenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sportveranstaltungen', function (Blueprint $table) {
            $table->increments('veran_ID');
            $table->dateTime('veranVon');
            $table->dateTime('veranTo');
            $table->unsignedInteger('veranLand_FK');
            $table->unsignedInteger('veranStadt_FK');
            $table->unsignedInteger('veranSportart_FK');
            $table->unsignedInteger('veranVeranstalter_FK');
            $table->integer('veranMinstaerke');
            $table->integer('veranMaxstaerke');
            $table->date('veranBewerbungBis');
            $table->string('veranAdresse');
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
        Schema::dropIfExists('sportveranstaltungen');
    }
}
