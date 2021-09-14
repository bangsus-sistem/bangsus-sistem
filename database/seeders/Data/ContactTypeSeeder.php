<?php

namespace Database\Seeders\Data;

use Bsb\Foundation\Database\ResourceSeeder;

class ContactTypeSeeder extends ResourceSeeder
{
    /**
     * @var array
     */
    protected $dataSources = [
        'contact_types' => 'data/contact-types.json',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('contact_types')->insert(
            $this->parseData($this->data['contact_types'])
        );
    }

    /**
     * @param  array  $contactTypes
     * @return array
     */
    public function parseData($contactTypes)
    {
        $return = [];
        foreach ($contactTypes as $contactType)
        {
            $return[] = [
                'id' => null,
                'code' => $contactType['code'],
                'name' => $contactType['name'],
                'active' => $contactType['active'] ?? true,
                'required' => $contactType['required'] ?? false,
                'description' => '',
                'note' => '',
                'user_create_id' => 1,
                'created_at' => now(),
            ];
        }
        return $return;
    }
}
