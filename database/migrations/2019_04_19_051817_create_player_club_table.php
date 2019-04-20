<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerClubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_club', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('player_id')->unsigned(); 
            $table->integer('club_id')->unsigned(); 
            $table->string('duration');
            $table->timestamps();

            $table->foreign('player_id')
            ->references('id')->on('player')
            ->onDelete('cascade');

            $table->foreign('club_id')
            ->references('id')->on('club')
            ->onDelete('cascade');
           
        });

        


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_club');
    }
}
