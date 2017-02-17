<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) { 
 
            $table->increments('id');
            $table->integer('score_team1'); 
            $table->integer('score_team2');
            $table->date('date');
            $table->time('start_time'); 
            $table->enum('type', ['Simple', 'Retour']);
            $table->integer('teams1_id')->unsigned(); 
            $table->integer('teams2_id')->unsigned(); 
            $table->integer('pools_id')->unsigned(); 
            $table->integer('courts_id')->unsigned(); 

            $table->foreign('teams1_id')->references('id')->on('teams'); 
            $table->foreign('teams2_id')->references('id')->on('teams'); 
            $table->foreign('pools_id')->references('id')->on('pools'); 
            $table->foreign('courts_id')->references('id')->on('courts'); 

        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('games');
    }
}
