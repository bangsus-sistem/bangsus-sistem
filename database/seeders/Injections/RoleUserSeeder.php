<?php

namespace Database\Seeders\Injections;

use Bsb\Foundation\Database\ResourceSeeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class RoleUserSeeder extends ResourceSeeder
{
    /**
     * @var array
     */
    protected $dataSources = [
        'roles' => 'injections/roles.json',
        'users' => 'injections/users.json',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles = $this->parseRoles();
        \DB::table('roles')->insert($roles);
        \DB::table('role_authorizations')->insert(
            $this->parseRoleAuthorizations()
        );
        \DB::table('users')->insert($this->parseUsers());

        \DB::table('roles')->update(['user_create_id' => 1]);
    }

    /**
     * @return array
     */
    private function parseRoles()
    {
        $roles = $this->data['roles'];
        foreach ($roles as $i => $role) $roles[$i]['created_at'] = Carbon::now();
        return $roles;
    }

    /**
     * @return array
     */
    private function parseUsers()
    {
        $users = $this->data['users'];
        foreach ($users as $i => $user) {
            $users[$i]['created_at'] = Carbon::now();
            $users[$i]['password'] = Hash::make($user['password']);
        }
        return $users;
    }

    /**
     * @return array
     */
    private function parseRoleAuthorizations()
    {
        $return = [];

        foreach ($this->data['roles'] as $role) {
            // Feature.
            if ($role['all_features']) {
                $features = \DB::table('features')->get();
                $features->each(
                    function ($feature) use (&$return, $role) {
                        $return[] = [
                            'role_id' => $role['id'],
                            'role_authorization_id' => $feature->id,
                            'role_authorization_type' => 'feature',
                        ];
                    }
                );
            }

            // Widget.
            if ($role['all_widgets']) {
                $widgets = \DB::table('widgets')->get();
                $widgets->each(
                    function ($widget) use (&$return, $role) {
                        $return[] = [
                            'role_id' => $role['id'],
                            'role_authorization_id' => $widget->id,
                            'role_authorization_type' => 'widget',
                        ];
                    }
                );
            }

            // Report.
            if ($role['all_reports']) {
                $reports = \DB::table('reports')->get();
                $reports->each(
                    function ($report) use (&$return, $role) {
                        $return[] = [
                            'role_id' => $role['id'],
                            'role_authorization_id' => $report->id,
                            'role_authorization_type' => 'report',
                        ];
                    }
                );
            }
        }

        return $return;
    }
}
