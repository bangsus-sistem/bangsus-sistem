<?php

namespace Database\Seeders\Data;

use Bsb\Foundation\Database\ResourceSeeder;

class BloodTypeSeeder extends ResourceSeeder
{
    /**
     * @var array
     */
    protected $dataSources = [
        'blood_types' => 'data/blood-types.json',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('blood_types')->insert(
            $this->parseData($this->data['blood_types'])
        );
    }

    /**
     * @param  array  $bloodTypes
     * @return array
     */
    public function parseData($bloodTypes)
    {
        foreach ($bloodTypes as $bloodType)
        {
            $return[] = [
                'id' => null,
                'name' => $bloodType['name'],
                'active' => $bloodType['active'] ?? true,
                'description' => '',
                'note' => '',
                'user_create_id' => 1,
                'created_at' => now(),
            ];
        }
        return $return;
    }
}
