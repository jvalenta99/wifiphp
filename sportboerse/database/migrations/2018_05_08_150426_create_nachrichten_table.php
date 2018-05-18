<?php



use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNachrichtenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nachrichten', function (Blueprint $table) {
            $table->increments('nachr_ID');
            $table->string('nachrText');
            $table->unsignedInteger('nachrFromBenut_FK')->nullable($value = true);
            $table->unsignedInteger('nachrVeran_FK')->nullable($value = true);
            $table->unsignedInteger('nachrToBenut_FK')->nullable($value = true);
            $table->foreign('nachrToBenut_FK')->references('id')->on('users');
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
        Schema::dropIfExists('nachrichten');
    }
}
