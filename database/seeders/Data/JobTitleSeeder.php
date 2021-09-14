<?php

namespace Database\Seeders\Data;

use Bsb\Foundation\Database\ResourceSeeder;

class JobTitleSeeder extends ResourceSeeder
{
    /**
     * @var array
     */
    protected $dataSources = [
        'job_titles' => 'data/job-titles.json',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('job_titles')->insert(
            $this->parseData($this->data['job_titles'])
        );
    }

    /**
     * @param  array  $jobTitles
     * @return array
     */
    public function parseData($jobTitles)
    {
        $return = [];
        $divisions = \DB::table('divisions')->get();
        foreach ($jobTitles as $jobTitle)
        {
            $division = $divisions->firstWhere('id', $jobTitle['division_id']);
            $return[] = [
                'id' => null,
                'code' => $division->code . '-' . $jobTitle['code'],
                'name' => $jobTitle['name'],
                'active' => $jobTitle['active'] ?? true,
                'division_id' => $jobTitle['division_id'],
                'description' => '',
                'note' => '',
                'user_create_id' => 1,
                'created_at' => now(),
            ];
        }
        return $return;
    }
}
