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
        Schema::create("staffs", function (Blueprint $table) {
            $table->bigIncrements('staff_id');
            $table->string("name");
            $table->string("email")->unique();
            $table->timestamp("email_verified_at")->nullable();
            $table->string("contact_no", 50)->unique();
            $table->string("status", 10);
            $table->unsignedDecimal("salary", $precision = 15, $scale = 2);
            $table->string("department", 20);
            $table->string("position", 100);
            $table->string("level", 20);
            $table->string("password");
            $table->rememberToken();
            $table->string("role");
            $table->integer("manager_id")->nullable();
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
        Schema::dropIfExists("staffs");
    }
};
