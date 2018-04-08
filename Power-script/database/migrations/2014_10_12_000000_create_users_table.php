<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('link_id')->nullable();
            $table->string('paypal_email')->nullable();
            $table->string('role')->default('user');
            $table->string('earnings')->default('0');
            $table->string('request_amount')->default('0');
            $table->string('ref_id')->nullable();
            $table->string('ref_income')->default('0');
            $table->integer('status')->default('0');
            $table->string('verifytoken');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
