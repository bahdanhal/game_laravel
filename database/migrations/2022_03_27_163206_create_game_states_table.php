<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('game_states');

        Schema::create('game_states', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('map_id');
            $table->unsignedInteger('round');
            $table->unsignedInteger('turn');
            $table->boolean('active');
            $table->timestamps();
        });
        Schema::table('game_states', function (Blueprint $table) {
            $table->foreign('map_id')->references('id')->on('maps');    
        });
        Schema::create('game_state_user', function (Blueprint $table) {

            $table->unsignedBigInteger('game_state_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('game_state_id')->references('id')->on('game_states')
                ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('game_states');
    }
}
