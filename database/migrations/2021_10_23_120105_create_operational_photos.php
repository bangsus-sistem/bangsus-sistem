<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationalPhotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operational_photos', function (Blueprint $table) {
            $table->id();
            $table->code();
            $table->operationalPhotoType();
            $table->branch();
            $table->employee('employee_id', true);
            $table->transactionDatetime();
            $table->image();
            $table->description();
            $table->note();
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
        Schema::dropIfExists('operational_photos');
    }
}
