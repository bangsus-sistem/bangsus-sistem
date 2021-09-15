<?php

namespace App\Macro\Blueprint\Foreign;

use Bsb\Foundation\Macro\BlueprintContract;
use Closure;

class AttendanceTypeBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function ($fieldName = 'attendance_type_id', $nullable = false) {
                $table = $this->foreignId($fieldName);
                if ($nullable) $table->nullable();
                return $table->constrained('attendance_types')->onUpdate('cascade');
            }
        );
    }
}
