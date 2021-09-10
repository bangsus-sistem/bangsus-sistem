<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->code()->nullable();
            $table->nik();
            $table->fullName();
            $table->birthPlace();
            $table->birthDate();
            $table->bloodType();
            $table->gender();
            $table->branch('first_branch_id');
            $table->jobTitle('first_job_title_id');
            $table->startDate();
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
        Schema::dropIfExists('employees');
    }
}
