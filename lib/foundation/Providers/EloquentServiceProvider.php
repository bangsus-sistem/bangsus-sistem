<?php

namespace Bsb\Foundation\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class EloquentServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerMorphAliasses();
    }

    /**
     * @return void
     */
    private function registerMorphAliasses()
    {
        $kernels = $this->getEloquentKernels();
        foreach ($kernels as $kernel) {
            $morphAliasses = $kernel::$relationMorphAliasses;
            Relation::morphMap($morphAliasses);
        }
    }

    /**
     * @return array
     */
    private function getEloquentKernels()
    {
        $kernels = config('bsb_foundation.eloquent.kernel');
        if (is_string($kernels)) $kernels = [$kernels];
        return $kernels;
    }
}
