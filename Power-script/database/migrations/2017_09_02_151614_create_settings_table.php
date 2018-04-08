<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('min_payout');
            $table->string('referal_per');
            $table->string('captcha');
            $table->string('mail_conform');
            $table->string('admin_register');
            $table->string('site_name');
            $table->text('google_api')->nullable();
            $table->string('description')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('site_favicon')->nullable();
            $table->text('keywords')->nullable();
            $table->string('nav_foo_color')->nullable();
            $table->string('footer_text');
            $table->string('facebook')->nullable();
            $table->string('google_plus')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
