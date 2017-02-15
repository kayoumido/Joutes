<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants_teams', function (Blueprint $table) { 
 
            $table->integer('participants_id')->unsigned(); 
            $table->integer('teams_id')->unsigned(); 
            $table->boolean('isCapitain');

            $table->foreign('participants_id')->references('id')->on('participants'); 
            $table->foreign('teams_id')->references('id')->on('teams'); 
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants_teams');
    }
}
