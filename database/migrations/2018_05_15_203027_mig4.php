<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mig4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('datetime');
            $table->string('address');
            $table->string('account');
            $table->timestamps();
        });

        Schema::create('audio_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->string('date');
            $table->string('account');
            $table->timestamps();
        });

        Schema::create('keyboard_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->string('date');
            $table->string('account');
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
