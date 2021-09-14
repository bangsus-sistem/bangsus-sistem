<?php

namespace Database\Seeders\Data;

use Bsb\Foundation\Database\ResourceSeeder;

class ContactTypeSeeder extends ResourceSeeder
{
    /**
     * @var array
     */
    protected $dataSources = [
        'employee_photo_types' => 'data/employee-photo-types.json',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('employee_photo_types')->insert(
            $this->parseData($this->data['employee_photo_types'])
        );
    }

    /**
     * @param  array  $employeePhotoTypes
     * @return array
     */
    public function parseData($employeePhotoTypes)
    {
        foreach ($employeePhotoTypes as $employeePhotoType)
        {
            $return[] = [
                'id' => null,
                'code' => $employeePhotoType['code'],
                'name' => $employeePhotoType['name'],
                'active' => $employeePhotoType['active'] ?? true,
                'required' => $employeePhotoType['required'] ?? false,
                'description' => '',
                'note' => '',
                'user_create_id' => 1,
                'created_at' => now(),
            ];
        }
        return $return;
    }
}
