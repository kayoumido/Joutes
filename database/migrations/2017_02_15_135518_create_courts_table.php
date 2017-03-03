<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courts', function (Blueprint $table) { 
 
            $table->increments('id'); 
            $table->integer('sports_id')->unsigned(); 
            $table->string('name', 45); 
 
            $table->foreign('sports_id')->references('id')->on('sports')->onDelete('cascade'); 
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('courts');
    }
}
