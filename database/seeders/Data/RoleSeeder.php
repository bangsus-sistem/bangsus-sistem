<?php

namespace Database\Seeders\Data;

use Bsb\Foundation\Database\ResourceSeeder;
use App\Models\Auth\Feature;

class RoleSeeder extends ResourceSeeder
{
    /**
     * @var array
     */
    protected $dataSources = [
        'roles' => 'data/roles.json',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->insert(
            $this->parseData($this->data['roles'])
        );
        \DB::table('role_authorizations')->insert(
            $this->parseRoleAuthorizations($this->data['roles'])
        );
    }

    /**
     * @param  array  $roles
     * @return array
     */
    public function parseData($roles)
    {
        $return = [];
        foreach ($roles as $role)
        {
            $return[] = [
                'id' => $role['id'],
                'code' => $role['code'],
                'name' => $role['name'],
                'active' => $role['active'] ?? true,
                'locked' => false,
                'hidden' => false,
                'all_features' => false,
                'all_widgets' => false,
                'all_reports' => false,
                'description' => '',
                'note' => '',
                'user_create_id' => 1,
                'created_at' => now(),
            ];
        }
        return $return;
    }

    /**
     * @return array
     */
    private function parseRoleAuthorizations()
    {
        $return = [];

        $features = Feature::with('module', 'action');
        foreach ($this->data['roles'] as $role) {
            // Feature.
            foreach ($role['role_authorizations']['features'] as $module => $actions) {
                foreach ($actions as $action) {
                    $feature = with(clone $features)->whereHas('module', fn ($q) => $q->where('ref', $module))
                        ->whereHas('action', fn($q) => $q->where('ref', $action))->first();
                    $return[] = [
                        'role_id' => $role['id'],
                        'role_authorization_id' => $feature->id,
                        'role_authorization_type' => 'feature'
                    ];
                }
            }
        }

        return $return;
    }
}
