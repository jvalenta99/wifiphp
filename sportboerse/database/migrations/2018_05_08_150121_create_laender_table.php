<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaenderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laender', function (Blueprint $table) {
            $table->increments('land_ID');
            $table->string('landName')->nullable($value = false);
            $table->string('landKurz')->nullable($value = false);
            $table->timestamps();
            $table->timestamp('created_at_jiri')->useCurrent();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laender');
    }
}
