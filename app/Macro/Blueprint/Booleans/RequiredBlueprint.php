<?php

namespace App\Macro\Blueprint\Booleans;

use Bsb\Foundation\Macro\BlueprintContract;
use Closure;

class RequiredBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->boolean('required');
            }
        );
    }
}