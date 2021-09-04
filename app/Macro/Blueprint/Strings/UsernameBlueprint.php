<?php

namespace App\Macro\Blueprint\Strings;

use Cheddarboss\Foundation\Macro\BlueprintContract;
use Closure;

class UsernameBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->string('username', 200)->unique();
            }
        );
    }
}
