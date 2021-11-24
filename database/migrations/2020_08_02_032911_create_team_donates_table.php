<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamDonatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('team_donates', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('team_id');
//            $table->unsignedInteger('item_id');
//            $table->unsignedInteger('item_conversion_id');
//            $table->unsignedInteger('user_id');
//            $table->unsignedInteger('value');
//
//            $table->timestamps();
//            $table->softDeletes();
//
//            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
//            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
//            $table->foreign('item_conversion_id')->references('id')->on('item_conversions')->onDelete('cascade');
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('team_donates');
    }
}
