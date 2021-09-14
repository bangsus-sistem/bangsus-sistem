<?php

namespace App\Macro\Blueprint\Date;

use Bsb\Foundation\Macro\BlueprintContract;
use Closure;

class EndDateBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->date('end_date');
            }
        );
    }
}
