<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('menus', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('name');
//            $table->enum('active', ['0', '1'])->default('1')->comment('0 = inactive; 1 = active');
//
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
//        Schema::dropIfExists('menus');
    }
}
