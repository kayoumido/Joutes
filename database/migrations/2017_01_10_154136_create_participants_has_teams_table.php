<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsHasTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants_has_teams', function (Blueprint $table) {

            $table->integer('fk_participants')->unsigned();
            $table->integer('fk_teams')->unsigned();

            $table->foreign('fk_participants')->references('id')->on('participants');
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
        Schema::dropIfExists('participants_has_teams');
    }
}
