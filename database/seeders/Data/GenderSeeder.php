<?php

namespace Database\Seeders\Data;

use Bsb\Foundation\Database\ResourceSeeder;

class GenderSeeder extends ResourceSeeder
{
    /**
     * @var array
     */
    protected $dataSources = [
        'genders' => 'data/genders.json',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('genders')->insert(
            $this->parseData($this->data['genders'])
        );
    }

    /**
     * @param  array  $genders
     * @return array
     */
    public function parseData($genders)
    {
        foreach ($genders as $gender)
        {
            $return[] = [
                'id' => null,
                'code' => $gender['code'],
                'name' => $gender['name'],
                'active' => $gender['active'] ?? true,
                'description' => '',
                'note' => '',
                'user_create_id' => 1,
                'created_at' => now(),
            ];
        }
        return $return;
    }
}
