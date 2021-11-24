<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('users', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('account_number')->unique();
//            $table->string('username')->unique();
//            $table->string('phone')->unique()->nullable();
//            $table->string('email')->unique();
//            $table->string('token')->unique()->nullable();
//            $table->string('otp_code')->unique();
//            $table->timestamp('otp_expired')->nullable();
//            $table->string('password')->nullable();
//            $table->unsignedInteger('total_lp')->default(0);
//            $table->unsignedInteger('total_bp')->default(0);
//            $table->unsignedInteger('total_coin')->default(0);
//            $table->unsignedInteger('total_exp')->default(0);
//            $table->unsignedInteger('fans_team_id')->nullable();
//            $table->unsignedInteger('rank_id')->default(1);
//            $table->unsignedInteger('role_id')->default(3);
//            $table->enum('provider', ['google', 'facebook', 'twitter'])->nullable();
//            $table->string('provider_id')->nullable();
//            $table->enum('phone_verified', ['0', '1'])->default('0')->comment('0 = verified; 1 = not verified');
//            $table->enum('email_verified', ['0', '1'])->default('0')->comment('0 = verified; 1 = not verified');
//            $table->timestamp('phone_verified_at')->nullable();
//            $table->timestamp('email_verified_at')->nullable();
//
//            $table->rememberToken();
//            $table->timestamps();
//            $table->softDeletes();
//
//            $table->foreign('fans_team_id')->references('id')->on('teams')->onDelete('cascade');
//            $table->foreign('rank_id')->references('id')->on('ranks')->onDelete('cascade');
//            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
//        });
//
//        Schema::create('user_items', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('user_id');
//            $table->unsignedInteger('item_id');
//            $table->unsignedInteger('value');
//
//            $table->timestamps();
//            $table->softDeletes();
//
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
//        });
//
//        Schema::create('user_transactions', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('user_id');
//            $table->unsignedInteger('item_id');
//            $table->unsignedInteger('value');
//            $table->enum('type', ['CR', 'DB'])->comment('CR = nambah; DB = ngurang');
//            $table->text('desc');
//
//            $table->timestamps();
//            $table->softDeletes();
//
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
//        });
//
//        Schema::create('user_logs', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('user_id');
//            $table->timestamps();
//
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
//        Schema::dropIfExists('users');
//        Schema::dropIfExists('user_items');
//        Schema::dropIfExists('user_transactions');
//        Schema::dropIfExists('user_logs');
    }
}
