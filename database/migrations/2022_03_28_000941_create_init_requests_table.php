<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('init_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('map_id');
            $table->boolean('active');
            $table->timestamps();
        });
        Schema::table('init_requests', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');    
        });
        Schema::table('init_requests', function (Blueprint $table) {
            $table->foreign('map_id')->references('id')->on('maps');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('init_requests');
    }
}
