<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerKeysTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_keys', function (Blueprint $table) {
            $table->string('key', 200);
            $table->integer('customer_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->primary('customer_id');
            $table->foreign('customer_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('customer_keys');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
