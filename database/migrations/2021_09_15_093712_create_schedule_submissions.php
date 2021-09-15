<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleSubmissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_submissions', function (Blueprint $table) {
            $table->id();
            $table->employee();
            $table->branch();
            $table->attendanceType();
            $table->image();
            $table->timestamp('schedule_in_datetime')->nullable();
            $table->timestamp('schedule_out_datetime')->nullable();
            $table->userTimestamps();
            $table->userAdmit();
            $table->userDelete();
            $table->timestamps();
            $table->admittedAt();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_submissions');
    }
}
