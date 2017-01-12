<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentsHasTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments_has_teams', function (Blueprint $table) {

            $table->integer('fk_tournaments')->unsigned();
            $table->integer('fk_teams')->unsigned();

            $table->foreign('fk_tournaments')->references('id')->on('tournaments');
            $table->foreign('fk_teams')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tournaments_has_teams');
    }
}
