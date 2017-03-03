<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('pools', function (Blueprint $table) { 
            $table->increments('id'); 
            $table->time('start_time'); 
            $table->time('end_time')->nullable();
            $table->string('poolName', 100);
            $table->integer('stage');
            $table->string('gameType', 45); 

            $table->integer('tournaments_id')->unsigned(); 
 
            $table->foreign('tournaments_id')->references('id')->on('tournaments'); 
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pools');
    }
}
