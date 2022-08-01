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
        Schema::create('clock_in_sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->dateTime('clock_in_datetime');
            $table->foreignId('staff_id')->constraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clock_in_sessions');
    }
};
