<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('teams', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('name');
//            $table->string('alias');
//            $table->string('logo')->nullable();
//            $table->string('website')->nullable();
//            $table->dateTime('formed_date');
//
//            $table->timestamps();
//            $table->softDeletes();
//        });
//
//        Schema::create('team_members', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('name');
//            $table->string('photo')->nullable();
//            $table->unsignedInteger('team_id');
//            $table->unsignedInteger('league_game_id')->nullable();
//            $table->dateTime('joined_date')->nullable();
//
//            $table->timestamps();
//            $table->softDeletes();
//
//            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
//            $table->foreign('league_game_id')->references('id')->on('league_games')->onDelete('cascade');
//        });
//
//        Schema::create('team_member_roles', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('member_id');
//            $table->unsignedInteger('role_id');
//
//            $table->timestamps();
//            $table->softDeletes();
//
//            $table->foreign('member_id')->references('id')->on('team_members')->onDelete('cascade');
//            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
//        });
//
//        Schema::create('team_league_games', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('team_id');
//            $table->unsignedInteger('league_game_id');
//
//            $table->timestamps();
//            $table->softDeletes();
//
//            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
//            $table->foreign('league_game_id')->references('id')->on('league_games')->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('teams');
//        Schema::dropIfExists('team_members');
//        Schema::dropIfExists('team_member_roles');
//        Schema::dropIfExists('team_league_games');
    }
}
