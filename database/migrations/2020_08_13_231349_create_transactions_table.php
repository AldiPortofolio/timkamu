<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('transactions', function (Blueprint $table) {
//            $table->increments('id');
//            $table->unsignedInteger('user_id')->nullable();
//            $table->string('phone')->nullable();
//            $table->string('transaction_number')->unique();
//            $table->unsignedInteger('item_id');
//            $table->unsignedInteger('total');
//            $table->unsignedInteger('total_price');
//            $table->json('desc')->nullable()->comment('for save detail of user and server id (diamond only)');
//            $table->enum('payment_type', ['GOPAY', 'DANA', 'OVO', 'LP']);
//            $table->enum('status', ['UNPAID', 'PAID', 'DONE'])->default('UNPAID')->comment('for diamonds, if done = diamond manual');
//
//            $table->timestamps();
//            $table->softDeletes();
//
//            $table->foreign('item_id')->references('id')->on('item_conversions')->onDelete('cascade');
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('transactions');
    }
}
