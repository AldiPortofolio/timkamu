<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('events', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('slug')->unique()->nullable();
//            $table->string('name');
//            $table->unsignedInteger('league_game_id');
//            $table->unsignedInteger('team_left_id');
//            $table->unsignedInteger('team_right_id');
//            $table->unsignedInteger('team_left_score')->default(0);
//            $table->unsignedInteger('team_right_score')->default(0);
//            $table->dateTime('start_date');
//            $table->longText('streaming_link')->nullable();
//            $table->enum('enable_support', ['0', '1'])->default('0')->comment('0 = disable; 1 = enable');
//            $table->enum('enable_chat', ['0', '1'])->default('1')->comment('0 = disable; 1 = enable');
//            $table->enum('type', ['UPCOMING', 'ONGOING', 'DONE'])->comment('upcoming = akan datang; ongoing = sedang berlangsung; done = selesai');
//            $table->unsignedInteger('created_by')->nullable();
//            $table->unsignedInteger('updated_by')->nullable();
//
//            $table->timestamps();
//            $table->softDeletes();
//
//            $table->foreign('league_game_id')->references('id')->on('league_games')->onDelete('cascade');
//            $table->foreign('team_left_id')->references('id')->on('teams')->onDelete('cascade');
//            $table->foreign('team_right_id')->references('id')->on('teams')->onDelete('cascade');
//            $table->foreign('created_by')->references('id')->on('admin_accounts')->onDelete('cascade');
//            $table->foreign('updated_by')->references('id')->on('admin_accounts')->onDelete('cascade');
//        });
//
//        Schema::create('event_sessions', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('name');
//            $table->unsignedInteger('event_id');
//            $table->unsignedInteger('team_left_score')->nullable();
//            $table->unsignedInteger('team_right_score')->nullable();
//            $table->unsignedInteger('duration')->nullable();
//            $table->enum('type', ['UPCOMING', 'ONGOING', 'DONE'])->comment('upcoming = akan datang; ongoing = sedang berlangsung; done = selesai');
//
//            $table->timestamps();
//            $table->softDeletes();
//
//            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
//        });
//
//        Schema::create('event_bet_categories', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('event_id');
//            $table->string('name');
//            $table->enum('type', ['1', '2', '3'])->comment('1 = win/lose; 2 = under/above; 3 = tebak score');
//            $table->unsignedInteger('value')->default(0);
//
//            $table->timestamps();
//            $table->softDeletes();
//        });
//
//        Schema::create('event_bet_rules', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('event_bet_category_id');
//            $table->unsignedInteger('event_id');
//            $table->enum('active', ['0', '1'])->comment('0 = inactive; 1 = active');
//            $table->json('value_detail');
//
//            $table->timestamps();
//            $table->softDeletes();
//
//            $table->foreign('event_bet_category_id')->references('id')->on('event_bet_categories')->onDelete('cascade');
//            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
//        });
//
//        Schema::create('event_transactions', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('event_id');
//            $table->unsignedInteger('event_bet_id');
//            $table->unsignedInteger('user_id');
//            $table->string('transaction_number');
//            $table->json('value_detail');
//            $table->enum('type', ['WIN', 'LOSS'])->nullable()->comment('win = tebakan benar; loss = tebakan salah');
//            $table->enum('status', ['1', '2', '3'])->nullable()->comment('1 = temporary; 2 = confirmed; 3 = calculated');
//
//            $table->timestamps();
//            $table->softDeletes();
//
//            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
//            $table->foreign('event_bet_id')->references('id')->on('event_bet_rules')->onDelete('cascade');
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//        });
//
//        Schema::create('event_bookmarks', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('event_id');
//            $table->unsignedInteger('user_id');
//
//            $table->timestamps();
//            $table->softDeletes();
//
//            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//        });
//
//        Schema::create('event_chats', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('event_id');
//            $table->unsignedInteger('user_id');
//            $table->text('message');
//            $table->enum('gift', ['0', '1'])->comment('1 = true; 0 = false');
//
//            $table->timestamps();
//            $table->softDeletes();
//
//            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
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
//        Schema::dropIfExists('events');
//        Schema::dropIfExists('event_sessions');
//        Schema::dropIfExists('event_bet_categories');
//        Schema::dropIfExists('event_bet_rules');
//        Schema::dropIfExists('event_transactions');
//        Schema::dropIfExists('event_bookmarks');
//        Schema::dropIfExists('event_chats');
    }
}
