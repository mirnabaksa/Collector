<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Migration7 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('location_infos');
        Schema::dropIfExists('audio_infos');
        Schema::dropIfExists('keyboard_infos');
        Schema::dropIfExists('collector_users');

        Schema::create('collector_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account');
            $table->timestamps();
        });

        Schema::create('location_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('latitude');
            $table->string('longitude');
            $table->string('datetime');
            $table->string('address');
            $table->timestamps();
        });

        Schema::create('audio_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('path');
            $table->string('date');
            $table->timestamps();
        });

        Schema::create('keyboard_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('text');
            $table->string('date');
            $table->timestamps();
        });


#        Schema::table('location_infos', function($table) {
#            $table->foreign('user_id')->references('id')->on('collector_users');
#        });
#        Schema::table('audio_infos', function($table) {
#            $table->foreign('user_id')->references('id')->on('collector_users');
#        });
#        Schema::table('keyboard_infos', function($table) {
#            $table->foreign('user_id')->references('id')->on('collector_users');
#        });
        
        
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
