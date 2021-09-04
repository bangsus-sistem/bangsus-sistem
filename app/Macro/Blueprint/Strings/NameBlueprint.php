<?php

namespace App\Macro\Blueprint\Strings;

use Bsb\Foundation\Macro\BlueprintContract;
use Closure;

class NameBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->string('name', 200);
            }
        );
    }
}
