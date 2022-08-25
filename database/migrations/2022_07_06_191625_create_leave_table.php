<?php

use App\Models\Staff;
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
        Schema::create("leaves", function (Blueprint $table) {
            $table->id("leave_id");
            $table->text("leave_status");
            $table->date("leave_start_date");
            $table->date("leave_end_date");
            $table->time("leave_start_time");
            $table->time("leave_end_time");
            $table->string("leave_type", 20);
            $table->unsignedBigInteger('staff_id');
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
        Schema::dropIfExists("leaves");
    }
};
