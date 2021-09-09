<?php

namespace App\Macro\Blueprint\Foreign;

use Bsb\Foundation\Macro\BlueprintContract;
use Closure;

class GenderBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function ($fieldName = 'gender_id', $nullable = false) {
                $table = $this->foreignId($fieldName);
                if ($nullable) $table->nullable();
                return $table->constrained('genders')->onUpdate('cascade');
            }
        );
    }
}
