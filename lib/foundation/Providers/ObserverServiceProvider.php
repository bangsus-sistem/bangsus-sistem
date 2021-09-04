<?php

namespace Bsb\Foundation\Providers;

use Illuminate\Support\ServiceProvider;
use Bsb\Foundation\Observer;
use LogicException;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $kernels = $this->getObserverKernels();
        foreach ($kernels as $kernel) {
            $observers = $kernel::observers();

            foreach ($observers as $model => $observer) {
                if ( ! (new $observer) instanceof Observer)
                    throw new LogicException(
                        'The observer: '.$observer.' must implements '.Observer::class
                    );

                $model::observe($observer);
            }
        }
    }

    /**
     * @return array
     */
    private function getObserverKernels()
    {
        $kernels = config('bsb_foundation.observer.kernel');
        if (is_string($kernels)) $kernels = [$kernels];
        return $kernels;
    }
}
