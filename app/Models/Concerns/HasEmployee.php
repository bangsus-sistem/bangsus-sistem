<?php

namespace App\Models\Concerns;

use App\Models\Hrm\Employee;

trait HasEmployee
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
