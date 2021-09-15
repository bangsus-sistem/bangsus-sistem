<?php

namespace App\Models\Concerns;

use App\Models\Hrm\AttendanceType;

trait HasAttendanceType
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch()
    {
        return $this->belongsTo(AttendanceType::class);
    }
}
