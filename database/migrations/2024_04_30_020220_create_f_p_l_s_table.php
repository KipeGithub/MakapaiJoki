<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_p_l_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from_user_id');
            $table->unsignedBigInteger('to_user_id');
            $table->dateTime('filling_time');
            $table->string('priority');
            $table->string('message_type');
            $table->integer('number');
            $table->string('reference_data');
            $table->string('aircraft_id');
            $table->string('ssr_mode');
            $table->string('ssr_code');
            $table->integer('flight_rules');
            $table->integer('type_of_flight');
            $table->integer('number_aircraft');
            $table->string('type_of_aircraft');
            $table->integer('wake_turb_cat');
            $table->string('equipment_1');
            $table->string('equipment_2');
            $table->string('depad');
            $table->dateTime('time');
            $table->string('cruising_speed')->nullable();
            $table->string('level')->nullable();
            $table->text('route');
            $table->string('dest_ad');
            $table->string('total_set_hh_min');
            $table->string('altn_ad');
            $table->string('second_altn_ad');
            $table->timestamps();

            $table->foreign('from_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('to_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fpl');
    }
};
