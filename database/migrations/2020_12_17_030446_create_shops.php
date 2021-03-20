<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShops extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('main_image');
            $table->string('atmosphere1');
            $table->string('atmosphere2');
            $table->string('atmosphere3');
            $table->string('telephone');
            $table->string('address');
            $table->string('opentime');
            $table->string('closetime');
            $table->string('gatheringtime');
            $table->string('holiday');
            $table->string('fee');
            $table->string('seatnum');
            $table->string('parkinglot');
            $table->string('routestation');
            $table->string('access');
            $table->string('area');
            $table->string('card');
            $table->string('commitment');
            $table->integer('user_id');
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
        //
    }
}
