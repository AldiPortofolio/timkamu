<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBugReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('bug_reports', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('name')->nullable();
//            $table->string('phone')->nullable();
//            $table->string('email')->nullable();
//            $table->longText('message')->nullable();
//
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('bug_reports');
    }
}
