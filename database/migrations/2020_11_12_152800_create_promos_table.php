<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('promos', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('title');
//            $table->longText('desc')->nullable();
//            $table->string('limit')->nullable();
//            $table->dateTime('start_date')->nullable();
//            $table->dateTime('end_date')->nullable();
//            $table->enum('active', ['0', '1'])->default('1')->comment('0 = inactive; 1 = active');
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
//        Schema::dropIfExists('promos');
    }
}
