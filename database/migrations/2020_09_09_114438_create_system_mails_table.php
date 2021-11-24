<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('system_mails', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('user_id');
//            $table->string('title');
//            $table->string('subject');
//            $table->longText('message');
//            $table->enum('status', ['0', '1', '2'])->default('0')->comment('0 = unread, 1 = read, 2 = just arrived');
//
//            $table->timestamps();
//            $table->softDeletes();
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
//        Schema::dropIfExists('system_mails');
    }
}
