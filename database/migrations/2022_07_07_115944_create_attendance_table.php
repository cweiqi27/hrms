<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("attendances", function (Blueprint $table) {
            $table->id("attendance_id");
            $table->date("date");
            $table->time("clock_in_time");
            $table->time("clock_out_time");
            $table->foreignId("staff_id")->constraints();
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
        Schema::dropIfExists("attendances");
    }
};
