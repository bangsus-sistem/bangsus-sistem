<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeMutations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_mutations', function (Blueprint $table) {
            $table->id();
            $table->employeeAssignment();
            $table->jobTitle();
            $table->startDate();
            $table->endDate()->nullable();
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
        Schema::dropIfExists('employee_mutations');
    }
}
