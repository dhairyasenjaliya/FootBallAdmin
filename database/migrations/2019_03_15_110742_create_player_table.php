<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->string('national_team');
            $table->string('position');
            $table->string('answer'); 
            $table->integer('club')->nullable();
            $table->enum('difficulty',['Easy','Medium','Hard'])->default('Easy');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player');
    }
}
