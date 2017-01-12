<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name', 45);
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_time');
            $table->time('end_time')->nullable();
            $table->integer('fk_events')->unsigned();

            $table->foreign('fk_events')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tournaments');
    }
}
