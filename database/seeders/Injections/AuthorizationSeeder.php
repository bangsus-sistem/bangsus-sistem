<?php

namespace Database\Seeders\Injections;

use Bsb\Foundation\Database\ResourceSeeder;

class AuthorizationSeeder extends ResourceSeeder
{
    /**
     * @var array
     */
    protected $dataSources = [
        'packages' => 'injections/packages.json',
        'actions' => 'injections/actions.json',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('actions')->insert($this->data['actions']);
        \DB::table('packages')->insert($this->parsePackages());
        \DB::table('modules')->insert($this->parseModules());
        \DB::table('features')->insert($this->parseFeatures());
        \DB::table('widgets')->insert($this->parseWidgets());
        \DB::table('reports')->insert($this->parseReports());
    }

    /**
     * @return array
     */
    private function parsePackages()
    {
        $return = [];
        foreach ($this->data['packages'] as $package)
            $return[] = [ 'ref' => $package['ref'] ];

        return $return;
    }

    /**
     * @return array
     */
    private function parseModules()
    {
        $return = [];
        $_packages = \DB::table('packages')->get();
        $packages = $this->data['packages'];

        if (count($packages) == 0) return $return;

        foreach ($packages as ['ref' => $ref, 'modules' => $modules]) {
            $packageRef = $ref;
            $package = with(clone $_packages)->where('ref', $packageRef)->first();

            if (count($modules) == 0) continue;
            foreach ($modules as ['ref' => $ref])
                $return[] = [
                    'package_id' => $package->id,
                    'ref' => $ref,
                ];
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
        $packages = $this->data['packages'];
        
        if (count($packages) == 0) return $return;

        foreach ($packages as ['modules' => $modules]) {
            $_modules = \DB::table('modules')->get();

            if (count($modules) == 0) continue;
            foreach ($modules as ['ref' => $ref, 'actions' => $actions]) {
                foreach ($actions as $actionRef) {
                    $module = $_modules->where('ref', $ref)->first();
                    $action = $_actions->where('ref', $actionRef)->first();

                    $return[] = [
                        'module_id' => $module->id,
                        'action_id' => $action->id,
                    ];
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
        $packages = $this->data['packages'];

        if (count($packages) == 0) return $return;

        foreach ($packages as ['ref' => $ref, 'widgets' => $widgets]) {
            $packageRef = $ref;
            $package = with(clone $_packages)->where('ref', $packageRef)->first();

            if (count($widgets) == 0) continue;
            foreach ($widgets as ['ref' => $ref])
                $return[] = [
                    'package_id' => $package->id,
                    'ref' => $ref,
                ];
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
        $packages = $this->data['packages'];

        if (count($packages) == 0) return $return;

        foreach ($packages as ['ref' => $ref, 'reports' => $reports]) {
            $packageRef = $ref;
            $package = with(clone $_packages)->where('ref', $packageRef)->first();

            if (count($reports) == 0) continue;
            foreach ($reports as ['ref' => $ref])
                $return[] = [
                    'package_id' => $package->id,
                    'ref' => $ref,
                ];
        }

        return $return;
    }
}
