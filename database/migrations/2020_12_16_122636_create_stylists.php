<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStylists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stylists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_m');
            $table->string('name_s');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('shop');
            $table->string('shoparea');
            $table->string('company');
            $table->string('profile_photo');
            $table->string('message');
            $table->string('message_booker');
            $table->string('message_completed');
            $table->integer('nomination_fee');
            $table->string('feature');
            $table->integer('official_campaign');
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
        Schema::dropIfExists('stylists');
    }
}
