<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminMenuGrantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('admin_menu_grants', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('admin_id');
//            $table->unsignedInteger('menu_id');
//            $table->string('name');
//
//            $table->rememberToken();
//            $table->timestamps();
//
//            $table->foreign('admin_id')->references('id')->on('admin_accounts')->onDelete('cascade');
//            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('admin_menu_grants');
    }
}
