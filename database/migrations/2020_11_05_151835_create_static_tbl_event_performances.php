<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaticTblEventPerformances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('static_tbl_event_performances', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('event_id');
//            $table->unsignedInteger('slip_menang');
//            $table->unsignedInteger('slip_kalah');
//            $table->unsignedInteger('our_net');
//            $table->unsignedInteger('our_net_rp');
//
//            $table->timestamps();
//            $table->softDeletes();
//
//            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('static_tbl_event_performances');
    }
}
