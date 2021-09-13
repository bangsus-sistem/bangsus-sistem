<?php

namespace Database\Seeders\Data;

use Bsb\Foundation\Database\ResourceSeeder;

class BranchTypeSeeder extends ResourceSeeder
{
    /**
     * @var array
     */
    protected $dataSources = [
        'branch_types' => 'data/branch-types.json',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('branch_types')->insert($this->parseData($this->data['branch_types']));
    }

    /**
     * Parse the branch types data.
     * 
     * @param  array  $data
     * @return array
     */
    public function parseData(array $data)
    {
        $return = [];

        foreach ($data as $branchType) {
            $branchType['active'] = true;
            $branchType['locked'] = false;
            $branchType['hidden'] = false;
            $branchType['note'] = '';
            $branchType['description'] = '';
            $branchType['user_create_id'] = 1;
            $branchType['created_at'] = now();
            $return[] = $branchType;
        }

        return $return;
    }
}
