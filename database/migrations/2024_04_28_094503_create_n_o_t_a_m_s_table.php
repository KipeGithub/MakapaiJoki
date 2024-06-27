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
        Schema::create('notams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from_user_id');
            $table->unsignedBigInteger('to_user_id');
            $table->string('from');
            $table->string('to');
            $table->dateTime('filling_time');
            $table->string('priority');
            $table->string('message_series_0');
            $table->string('message_series_1');
            $table->string('number_0');
            $table->integer('number_1');
            $table->string('number_2');
            $table->string('number_3');
            $table->string('identified');
            $table->string('fir');
            $table->string('notam_code_0');
            $table->string('notam_code_1');
            $table->string('traffic');
            $table->string('purpose');
            $table->string('scope');
            $table->string('lower_limit');
            $table->string('upper_limit');
            $table->string('coordinates');
            $table->string('location_0');
            $table->string('location_1');
            $table->string('location_2');
            $table->string('location_3');
            $table->string('fYYMMDDhhmm');
            $table->integer('estperm');
            $table->string('time_schedule');
            $table->text('text_of_notam');
            $table->string('file_path')->nullable();
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
        Schema::dropIfExists('notams');
    }
};
