<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('admin_accounts', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('account_number')->unique();
//            $table->string('username')->unique();
//            $table->string('phone')->unique();
//            $table->string('email')->unique();
//            $table->string('address')->nullable();
//            $table->string('password');
//            $table->unsignedInteger('role_id')->default(2);
//            $table->enum('active', ['0', '1'])->default('1')->comment('0 = inactive; 1 = active');
//
//            $table->rememberToken();
//            $table->timestamps();
//            $table->softDeletes();
//
//            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('admin_accounts');
    }
}
