<?php

namespace Database\Seeders\Data;

use Bsb\Foundation\Database\ResourceSeeder;

class BranchSeeder extends ResourceSeeder
{
    /**
     * @var array
     */
    protected $dataSources = [
        'branches' => 'data/branches.json',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('branches')->insert($this->parseData($this->data['branches']));
        \DB::statement('insert into branch_user select id, 1 from branches');
    }

    /**
     * @param  array  $branches
     * @return array
     */
    public function parseData($branches)
    {
        $return = [];
        $branchTypes = \DB::table('branch_types')->get();
        foreach ($branches as $branch)
        {
            $branchType = $branchTypes->firstWhere('id', $branch['branch_type_id']);
            $return[] = [
                'id' => null,
                'code' => $branchType->code . $branch['code'],
                'name' => $branch['name'],
                'branch_type_id' => $branchType->id,
                'position' => isset($branch['position']) ? \DB::raw("GeomFromText('POINT({$branch['position']['latitude']} {$branch['position']['longitude']})')") : null,
                'off_day' => 4,
                'active' => $branch['active'] ?? true,
                'locked' => false,
                'hidden' => false,
                'description' => '',
                'note' => '',
                'user_create_id' => 1,
                'created_at' => now(),
            ];
        }
        return $return;
    }
}
