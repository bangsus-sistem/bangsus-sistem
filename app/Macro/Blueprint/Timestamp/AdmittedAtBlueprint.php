<?php

namespace App\Macro\Blueprint\Timestamp;

use Bsb\Foundation\Macro\BlueprintContract;
use Closure;

class AdmittedAtBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->timestamp('admitted_at')->nullable();
            }
        );
    }
}
