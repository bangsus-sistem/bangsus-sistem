<?php

namespace Database\Seeders\Data;

use Bsb\Foundation\Database\ResourceSeeder;

class DivisionSeeder extends ResourceSeeder
{
    /**
     * @var array
     */
    protected $dataSources = [
        'divisions' => 'data/divisions.json',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('divisions')->insert(
            $this->parseData($this->data['divisions'])
        );
    }

    /**
     * @param  array  $divisions
     * @return array
     */
    public function parseData($divisions)
    {
        foreach ($divisions as $division)
        {
            $return[] = [
                'id' => null,
                'code' => $division['code'],
                'name' => $division['name'],
                'active' => $division['active'] ?? true,
                'description' => '',
                'note' => '',
                'user_create_id' => 1,
                'created_at' => now(),
            ];
        }
        return $return;
    }
}
