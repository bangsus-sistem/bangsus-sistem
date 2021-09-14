<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InjectionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::transaction(function () {
            $this->call([
                Injections\AuthorizationSeeder::class,
                Injections\RoleUserSeeder::class,
                Injections\AttendanceTypeSeeder::class,
            ]);
        });
    }
}
