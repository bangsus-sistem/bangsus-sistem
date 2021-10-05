<?php

namespace Database\Seeders\Authorization;

use Bsb\Foundation\Database\ResourceSeeder;
use App\Models\Auth\Role;

class AuthorizationSeeder extends ResourceSeeder
{
    /**
     * @var array
     */
    protected $dataSources = [
        'packages' => 'authorization/packages.json',
        'actions' => 'authorization/actions.json',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('actions')->insert($this->parseActions());
        \DB::table('packages')->insert($this->parsePackages());
        \DB::table('modules')->insert($this->parseModules());
        \DB::table('features')->insert($this->parseFeatures());
        \DB::table('widgets')->insert($this->parseWidgets());
        \DB::table('reports')->insert($this->parseReports());

        Role::get()->each(function ($role) {
            if ($role->all_features) {
                $role->features()->sync(
                    \DB::table('features')->get()->pluck('id')->all()
                );
            }

            if ($role->all_widgets) {
                $role->widgets()->sync(
                    \DB::table('widgets')->get()->pluck('id')->all()
                );
            }

            if ($role->all_reports) {
                $role->reports()->sync(
                    \DB::table('reports')->get()->pluck('id')->all()
                );
            }
        });

    }

    /**
     * @return array
     */
    private function parsePackages()
    {
        $packages = \DB::table('packages')->get();
        $return = [];
        foreach ($this->data['packages'] as $package)
            if (is_null(with(clone $packages)->where('ref', $package['ref'])))
                $return[] = [
                    'ref' => $package['ref']
                ];

        return $return;
    }

    /**
     * @return array
     */
    private function parseActions()
    {
        $actions = \DB::table('actions')->get();
        $return = [];
        foreach ($this->data['actions'] as $action)
            if (is_null(with(clone $actions)->where('ref', $action['ref'])))
                $return[] = [
                    'ref' => $action['ref']
                ];

        return $return;
    }

    /**
     * @return array
     */
    private function parseModules()
    {
        $return = [];
        $_packages = \DB::table('packages')->get();
        $_modules = \DB::table('modules')->get();
        $packages = $this->data['packages'];

        if (count($packages) == 0) return $return;

        foreach ($packages as ['ref' => $ref, 'modules' => $modules]) {
            $packageRef = $ref;
            $package = with(clone $_packages)->where('ref', $packageRef)->first();

            if (count($modules) == 0) continue;
            foreach ($modules as ['ref' => $ref]) {
                if (is_null(with(clone $_modules)->where('ref', $ref)->first())) {
                    $return[] = [
                        'package_id' => $package->id,
                        'ref' => $ref,
                    ];
                }
            } 
        }

        return $return;
    }

    /**
     * @return array
     */
    private function parseFeatures()
    {
        $return = [];
        $_actions = \DB::table('actions')->get();
        $_modules = \DB::table('modules')->get();
        $_features = \DB::table('features')->get();
        $packages = $this->data['packages'];
        
        if (count($packages) == 0) return $return;

        foreach ($packages as ['modules' => $modules]) {

            if (count($modules) == 0) continue;
            foreach ($modules as ['ref' => $ref, 'actions' => $actions]) {
                foreach ($actions as $actionRef) {
                    $module = $_modules->where('ref', $ref)->first();
                    $action = $_actions->where('ref', $actionRef)->first();

                    if (is_null(with(clone $_features)->where('module_id', $module->id)->where('action_id', $action->id)->first())) {
                        $return[] = [
                            'module_id' => $module->id,
                            'action_id' => $action->id,
                        ];
                    }
                }
            }
        }

        return $return;
    }

    /**
     * @return array
     */
    private function parseWidgets()
    {
        $return = [];
        $_packages = \DB::table('packages')->get();
        $_widgets = \DB::table('widgets')->get();
        $packages = $this->data['packages'];

        if (count($packages) == 0) return $return;

        foreach ($packages as ['ref' => $ref, 'widgets' => $widgets]) {
            $packageRef = $ref;
            $package = with(clone $_packages)->where('ref', $packageRef)->first();

            if (count($widgets) == 0) continue;
            foreach ($widgets as ['ref' => $ref]) {
                if (is_null(with(clone $_widgets)->where('ref', $ref)->first())) {
                    $return[] = [
                        'package_id' => $package->id,
                        'ref' => $ref,
                    ];
                }
            }
        }

        return $return;
    }

    /**
     * @return array
     */
    private function parseReports()
    {
        $return = [];
        $_packages = \DB::table('packages')->get();
        $_reports = \DB::table('reports')->get();
        $packages = $this->data['packages'];

        if (count($packages) == 0) return $return;

        foreach ($packages as ['ref' => $ref, 'reports' => $reports]) {
            $packageRef = $ref;
            $package = with(clone $_packages)->where('ref', $packageRef)->first();

            if (count($reports) == 0) continue;
            foreach ($reports as ['ref' => $ref]) {
                if (is_null(with(clone $_reports)->where('ref', $ref)->first())) {
                    $return[] = [
                        'package_id' => $package->id,
                        'ref' => $ref,
                    ];
                }
            }
        }

        return $return;
    }
}
