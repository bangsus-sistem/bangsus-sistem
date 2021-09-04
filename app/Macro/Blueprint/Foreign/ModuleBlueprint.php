<?php

namespace App\Macro\Blueprint\Foreign;

use Cheddarboss\Foundation\Macro\BlueprintContract;
use Closure;

class ModuleBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function ($fieldName = 'module_id', $nullable = false) {
                $table = $this->foreignId($fieldName);
                if ($nullable) $table->nullable();
                return $table->constrained('modules')->onUpdate('cascade');
            }
        );
    }
}
