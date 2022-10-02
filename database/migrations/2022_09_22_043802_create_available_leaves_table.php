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
        Schema::create('available_leaves', function (Blueprint $table) {
            $table->bigIncrements('available_leaves_id');
            $table->unsignedSmallInteger('available_annual_leaves');
            $table->unsignedSmallInteger('available_medical_leaves');
            $table->unsignedSmallInteger('available_maternity_leaves');
            $table->unsignedBigInteger('staff_id')->unique();
            $table->foreign('staff_id')->references('staff_id')->on('staffs');
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
        Schema::dropIfExists('avaiable_leaves');
    }
};
