<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AuthorizationSeeder extends Seeder
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
                Authorization\AuthorizationSeeder::class,
            ]);
        });
    }
}
