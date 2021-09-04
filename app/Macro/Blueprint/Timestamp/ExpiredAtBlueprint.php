<?php

namespace App\Macro\Blueprint\Timestamp;

use Cheddarboss\Foundation\Macro\BlueprintContract;
use Closure;

class ExpiredAtBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->timestamp('expired_at')->nullable();
            }
        );
    }
}
