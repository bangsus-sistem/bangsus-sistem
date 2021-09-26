<?php

namespace App\Macro\Blueprint\Decimal;

use Bsb\Foundation\Macro\BlueprintContract;
use Closure;

class StandarizedDecimalBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function ($column) {
                return $this->decimal($column, 50, 20);
            }
        );
    }
}
