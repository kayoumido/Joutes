<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoolModesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('poolModes', function (Blueprint $table) { 
 
            $table->increments('id'); 
            $table->string('modeDescription', 1000); 
            $table->integer('planningAlgorithm'); 
    
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poolModes'); 
    }
}
