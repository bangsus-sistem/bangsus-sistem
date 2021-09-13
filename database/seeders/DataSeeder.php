<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
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
                Data\BranchTypeSeeder::class,
                Data\BranchSeeder::class,
            ]);
        });
    }
}
