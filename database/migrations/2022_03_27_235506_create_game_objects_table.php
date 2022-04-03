<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_objects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_object_type_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('game_state_id');
            $table->unsignedInteger('coordinate_x')->nullable();
            $table->unsignedInteger('coordinate_y')->nullable();
            $table->unsignedInteger('points')->nullable();
            $table->timestamps();
        });
        Schema::table('game_objects', function (Blueprint $table) {
            $table->foreign('game_object_type_id')->references('id')->on('game_object_types');    
        });
        Schema::table('game_objects', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');    
        });
        Schema::table('game_objects', function (Blueprint $table) {
            $table->foreign('game_state_id')->references('id')->on('game_states');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
