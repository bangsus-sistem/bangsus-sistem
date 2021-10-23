<?php

namespace App\Macro\Blueprint\Timestamp;

use Bsb\Foundation\Macro\BlueprintContract;
use Closure;

class TransactionDatetimeBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->timestamp('transaction_datetime')->nullable();
            }
        );
    }
}
