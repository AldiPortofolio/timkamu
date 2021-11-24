<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigBalancers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('config_balancers', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('rules');
//            $table->unsignedInteger('value');
//            $table->enum('active', ['0', '1'])->default('1')->comment('0 = not active; 1 = active');
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
//        Schema::dropIfExists('table_config_balancers');
    }
}
