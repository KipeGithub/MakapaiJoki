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
        Schema::create('meteos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from_user_id');
            $table->unsignedBigInteger('to_user_id');
            $table->dateTime('filling_time');
            $table->string('priority');
            $table->string('message_id_part1');
            $table->string('message_id_part2');
            $table->string('message_id_part3');
            $table->string('origin');
            $table->string('issued');
            $table->string('type');
            $table->string('location');
            $table->string('observed');
            $table->text('free_text_metar');
            $table->string('file')->nullable();
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
        Schema::dropIfExists('meteos');
    }
};
