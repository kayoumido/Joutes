<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentsHasCourtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments_has_courts', function (Blueprint $table) {

            $table->integer('fk_tournaments')->unsigned();
            $table->integer('fk_courts')->unsigned();

            $table->foreign('fk_tournaments')->references('id')->on('tournaments');
            $table->foreign('fk_courts')->references('id')->on('courts');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tournaments_has_courts');
    }
}
