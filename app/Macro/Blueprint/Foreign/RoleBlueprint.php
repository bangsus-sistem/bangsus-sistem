<?php

namespace App\Macro\Blueprint\Foreign;

use Cheddarboss\Foundation\Macro\BlueprintContract;
use Closure;

class RoleBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function ($fieldName = 'role_id', $nullable = false) {
                $table = $this->foreignId($fieldName);
                if ($nullable) $table->nullable();
                return $table->constrained('roles')->onUpdate('cascade');
            }
        );
    }
}
