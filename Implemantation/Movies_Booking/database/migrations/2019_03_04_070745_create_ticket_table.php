<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->increments('ticket_id');
            $table->float('totalprice');
            $table->integer('book_id')->unsigned();
            $table->foreign('book_id')->references('book_id')->on('booking');
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
        Schema::dropIfExists('ticket');
    }
}
