<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournaments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('tournaments', function (Blueprint $table) {
//            $table->id();
//            $table->timestamps();
//            $table->dateTime('registration_start');
//            $table->dateTime('tournament_start');
//            $table->integer('slot');
//            $table->string('location');
//            $table->string('rewards');
//            $table->string('description');
//            $table->string('rule');
//            $table->integer('membership');
//            $table->string('schedule');
//            $table->unsignedInteger('id_game');
//            $table->foreign('id_game')->references('id')->on('games');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('tournaments');
    }
}
