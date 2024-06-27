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
        Schema::create('flighr_routes', function (Blueprint $table) {
            $table->id();
            $table->string('departure_aero');
            $table->string('destination_aero');
            $table->string('routes');
            $table->string('est_waktu');
            $table->string('speed');
            $table->string('flight_level');
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
        Schema::dropIfExists('flighr_routes');
    }
};
