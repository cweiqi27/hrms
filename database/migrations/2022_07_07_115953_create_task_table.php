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
        Schema::create('task', function (Blueprint $table) {
            $table->id('task_id');
            $table->text('task_name');
            $table->datetime('task_start_date');
            $table->datetime('task_end_date');
            $table->foreignId('admin_id')->constraints('admin');
            $table->foreignId('employee_id')->constraints('employee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task');
    }
};
