<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeePhotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_photos', function (Blueprint $table) {
            $table->id();
            $table->employee();
            $table->employeePhotoType();
            $table->image();
            $table->description();
            $table->note();
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
        Schema::dropIfExists('employee_photos');
    }
}
