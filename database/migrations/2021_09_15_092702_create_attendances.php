<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->employee();
            $table->branch();
            $table->attendanceType();
            $table->image('image_in_id');
            $table->image('image_out_id');
            $table->timestamp('schedule_in_datetime')->nullable();
            $table->timestamp('schedule_out_datetime')->nullable();
            $table->timestamp('attendance_in_datetime')->nullable();
            $table->timestamp('attendance_out_datetime')->nullable();
            $table->point('position_in')->nullable();
            $table->point('position_out')->nullable();
            $table->userTimestamps();
            $table->userDelete();
            $table->timestamps();
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
        Schema::dropIfExists('attendances');
    }
}
