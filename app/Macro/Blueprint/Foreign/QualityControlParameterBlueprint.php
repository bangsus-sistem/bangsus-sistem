<?php

namespace App\Macro\Blueprint\Foreign;

use Bsb\Foundation\Macro\BlueprintContract;
use Closure;

class QualityControlParameterBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function ($fieldName = 'quality_control_parameter_id', $nullable = false) {
                $table = $this->foreignId($fieldName);
                if ($nullable) $table->nullable();
                return $table->constrained('quality_control_parameters')->onUpdate('cascade');
            }
        );
    }
}
