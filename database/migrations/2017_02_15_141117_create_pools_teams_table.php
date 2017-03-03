<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoolsTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pool_team', function (Blueprint $table) { 
            $table->increments('id'); 
            $table->integer('rank_in_pool'); 
            $table->integer('pool_id')->unsigned();
            $table->integer('team_id')->unsigned(); 
            $table->integer('from_pool_id')->unsigned()->nullable(); 
 
            $table->foreign('pool_id')->references('id')->on('pools'); 
            $table->foreign('team_id')->references('id')->on('teams'); 
            $table->foreign('from_pool_id')->references('id')->on('pools'); 
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pool_team');
    }
}
