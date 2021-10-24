<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationalPhotoPenalties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operational_photo_penalties', function (Blueprint $table) {
            $table->id();
            $table->code();
            $table->operationalPhoto();
            $table->operationalPhotoPenaltyType()->index('long_index_2');
            $table->standarizedDecimal('amount');
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
        Schema::dropIfExists('operational_photo_penalties');
    }
}
