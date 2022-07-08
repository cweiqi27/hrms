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
        Schema::create('employee', function (Blueprint $table) {
            $table->id('employee_id');
            $table->string('employee_name', 50);
            $table->string('employee_email', 50)->unique();
            $table->string('employee_contact_no', 50)->unique();
            $table->string('status', 10);
            $table->unsignedDecimal('salary', $precision = 15, $scale = 2);
            $table->string('department');
            $table->foreignId('leave_id')->constraints('leave');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
};
