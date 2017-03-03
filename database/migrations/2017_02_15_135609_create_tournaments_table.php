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
            $table->dateTime('start_date'); 
            $table->string('img',45); 
            $table->integer('events_id')->unsigned();
            $table->integer('sports_id')->unsigned(); 
 
            $table->foreign('events_id')->references('id')->on('events'); 
            $table->foreign('sports_id')->references('id')->on('sports'); 
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
