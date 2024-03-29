<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesAndUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->code();
            $table->name();
            $table->active();
            $table->locked();
            $table->hidden();
            $table->allFeatures();
            $table->allWidgets();
            $table->allReports();
            $table->description();
            $table->note();
        });
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->username();
            $table->password();
            $table->fullName();
            $table->role();
            $table->active();
            $table->locked();
            $table->hidden();
            $table->allBranches();
            $table->description();
            $table->note();
        });
        Schema::table('roles', function (Blueprint $table) {
            $table->userTimestamps();
            $table->userDelete();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('users', function (Blueprint $table) {
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
        Schema::table('roles', function (Blueprint $table) {
            $table->dropForeign(['user_create_id', 'user_update_id', 'user_delete_id']);
        });
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
    }
}
