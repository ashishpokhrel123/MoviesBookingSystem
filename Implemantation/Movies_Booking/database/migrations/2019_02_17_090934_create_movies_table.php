<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('mov_id');
            $table->string('mov_title');
            $table->string('mov_director');
            $table->string('mov_cast');
            $table->string('mov_type');
            $table->string('mov_lang');
            $table->string('mov_realsedate');
            $table->string('mov_duration');
            $table->string('image')->nullable();
            $table->string('mov_url')->nullable();
            $table->string('mov_description');
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
        Schema::dropIfExists('movies');
    }
}
