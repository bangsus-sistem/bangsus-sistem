<?php

namespace App\Macro\Blueprint\Strings;

use Bsb\Foundation\Macro\BlueprintContract;
use Closure;

class BirthPlaceBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->string('birth_place', 200);
            }
        );
    }
}
