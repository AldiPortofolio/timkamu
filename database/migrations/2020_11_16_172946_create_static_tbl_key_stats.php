<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaticTblKeyStats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('static_tbl_key_stats', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('key');
//            $table->dateTime('start_date');
//            $table->dateTime('end_date');
//            $table->unsignedInteger('total_members')->default(0);
//            $table->unsignedInteger('total_member_phone_verified')->default(0);
//            $table->unsignedInteger('total_unique_visitors')->default(0);
//            $table->enum('status', ['0', '1'])->default('1')->comment('0 = undone; 1 = done');
//
//            $table->timestamps();
//            $table->softDeletes();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('static_tbl_key_stats');
    }
}
