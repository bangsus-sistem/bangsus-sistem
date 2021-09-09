<?php

namespace App\Macro\Blueprint\Foreign;

use Bsb\Foundation\Macro\BlueprintContract;
use Closure;

class UserAdmitBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                $this->user('user_admit_id', true);
            }
        );
    }
}
