<?php

namespace App\Macro\Blueprint\Strings;

use Cheddarboss\Foundation\Macro\BlueprintContract;
use Closure;

class DescriptionBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->string('description', 1000)->nullable();
            }
        );
    }
}
