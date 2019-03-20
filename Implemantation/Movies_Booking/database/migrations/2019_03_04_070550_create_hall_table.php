<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hall', function (Blueprint $table) {
            $table->increments('hall_id');
            $table->integer('show_id')->unsigned();
            $table->foreign('show_id')->references('show_id')->on('shows');
            $table->integer('screen_id')->unsigned();
            $table->foreign('screen_id')->references('screen_id')->on('screen');
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
        Schema::dropIfExists('hall');
    }
}
