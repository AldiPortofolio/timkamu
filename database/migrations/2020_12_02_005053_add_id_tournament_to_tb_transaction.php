<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdTournamentToTbTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('transactions', function (Blueprint $table) {
//            $table->unsignedBigInteger('id_tournament')->nullable();
//            $table->foreign('id_tournament')->references('id')->on('tournaments');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_transaction', function (Blueprint $table) {
            //
        });
    }
}
