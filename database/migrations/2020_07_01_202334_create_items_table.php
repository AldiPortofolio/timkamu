<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('items', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('name');
//            $table->string('logo')->nullable();
//            $table->enum('type', ['currencies', 'mlbb', 'freefire', 'pubg', 'donation'])->comment('currencies = LP,BP,coins; secondary = pulsa; donation = item donation');
//            $table->enum('active', ['0','1'])->comment('0 = not active; 1= active')->nullable();
//
//            $table->timestamps();
//            $table->softDeletes();
//        });
//
//        Schema::create('item_conversions', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('parent_id');
//            $table->unsignedInteger('child_id');
//            $table->unsignedInteger('value')->comment('1 child_id = x parent_id');
//
//            $table->timestamps();
//            $table->softDeletes();
//
//            $table->foreign('parent_id')->references('id')->on('items')->onDelete('cascade');
//            $table->foreign('child_id')->references('id')->on('items')->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('items');
//        Schema::dropIfExists('item_conversions');
    }
}
