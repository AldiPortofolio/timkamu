<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('quests', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('title');
//            $table->longText('desc')->nullable();
//            $table->json('value_detail');
//            $table->enum('type', ['ONCE', 'REPEATABLE', 'REPEAT_PROGRESS'])->nullable();
//
//            $table->timestamps();
//            $table->softDeletes();
//        });
//
//        Schema::create('user_quests', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('quest_id');
//            $table->unsignedInteger('user_id');
//            $table->json('value_detail')->nullable();
//
//            $table->timestamps();
//            $table->softDeletes();
//
//            $table->foreign('quest_id')->references('id')->on('quests')->onDelete('cascade');
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
//        Schema::dropIfExists('quests');
//        Schema::dropIfExists('user_quests');
    }
}
