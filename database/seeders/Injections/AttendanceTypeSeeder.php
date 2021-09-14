<?php

namespace Database\Seeders\Injections;

use Bsb\Foundation\Database\ResourceSeeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class RoleUserSeeder extends ResourceSeeder
{
    /**
     * @var array
     */
    protected $dataSources = [
        'attendance_types' => 'injections/attendance-types.json',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('attendance_types')->insert($this->data['attendance_types']);
    }
}
