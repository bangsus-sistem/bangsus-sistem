<?php

namespace App\Models\Concerns;

use App\Models\Hrm\Employee;

trait HasManyEmployee
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
