<?php

namespace Database\Seeders\Data;

use Bsb\Foundation\Database\ResourceSeeder;

class AddressTypeSeeder extends ResourceSeeder
{
    /**
     * @var array
     */
    protected $dataSources = [
        'address_types' => 'data/address-types.json',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('address_types')->insert(
            $this->parseData($this->data['address_types'])
        );
    }

    /**
     * @param  array  $addressTypes
     * @return array
     */
    public function parseData($addressTypes)
    {
        foreach ($addressTypes as $addressType)
        {
            $return[] = [
                'id' => null,
                'code' => $addressType['code'],
                'name' => $addressType['name'],
                'active' => $addressType['active'] ?? true,
                'required' => $addressType['required'] ?? false,
                'description' => '',
                'note' => '',
                'user_create_id' => 1,
                'created_at' => now(),
            ];
        }
        return $return;
    }
}
