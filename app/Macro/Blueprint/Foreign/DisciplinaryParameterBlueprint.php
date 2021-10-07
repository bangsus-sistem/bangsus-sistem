<?php

namespace App\Macro\Blueprint\Foreign;

use Bsb\Foundation\Macro\BlueprintContract;
use Closure;

class DisciplinaryParameterBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function ($fieldName = 'disciplinary_parameter_id', $nullable = false) {
                $table = $this->foreignId($fieldName);
                if ($nullable) $table->nullable();
                return $table->constrained('disciplinary_parameters')->onUpdate('cascade');
            }
        );
    }
}
