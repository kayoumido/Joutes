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
        Schema::create('pools_teams', function (Blueprint $table) { 
            $table->increments('id'); 
            $table->integer('rank_in_pool'); 
            $table->integer('pools_id')->unsigned();
            $table->integer('teams_id')->unsigned(); 
            $table->integer('parent_pool_id')->unsigned()->nullable(); 
 
            $table->foreign('pools_id')->references('id')->on('pools'); 
            $table->foreign('teams_id')->references('id')->on('teams'); 
            $table->foreign('parent_pool_id')->references('id')->on('pools'); 
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pools_teams');
    }
}
