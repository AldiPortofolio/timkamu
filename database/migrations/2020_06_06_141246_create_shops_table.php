<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('shops', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('name');
//            $table->string('alias');
//            $table->string('logo')->nullable();
//            $table->string('meta');
//            $table->string('reason')->nullable();
//            $table->dateTime('open_date')->nullable();
//            $table->enum('active', ['0', '1'])->comment('0 = not active; 1 = active')->default('0');
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
//        Schema::dropIfExists('shops');
    }
}
