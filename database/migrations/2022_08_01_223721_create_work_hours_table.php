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
        Schema::create("work_hours", function (Blueprint $table) {
            $table->id("work_hours_id");
            $table->unsignedInteger("daily_work_hours");
            $table->unsignedInteger("weekly_work_hours")->nullable();
            $table->unsignedInteger("yearly_work_hours")->nullable();
            $table->unsignedInteger("accumulative_work_hours");
            $table->foreignId("staff_id")->constraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("work_hours");
    }
};
