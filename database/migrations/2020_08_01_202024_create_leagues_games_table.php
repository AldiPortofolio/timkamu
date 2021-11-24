<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaguesGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('leagues', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('name');
//            $table->string('logo')->nullable();
//
//            $table->timestamps();
//            $table->softDeletes();
//        });
//
//        Schema::create('games', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('name');
//            $table->string('logo')->nullable();
//
//            $table->timestamps();
//            $table->softDeletes();
//        });
//
//        Schema::create('league_games', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('league_id');
//            $table->unsignedInteger('game_id');
//
//            $table->timestamps();
//            $table->softDeletes();
//
//            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('cascade');
//            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('leagues');
//        Schema::dropIfExists('games');
//        Schema::dropIfExists('league_games');
    }
}
