<?php

namespace App\Models\Hrm;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Models\Concerns\{
    HasEmployee,
    HasBranch,
    HasAttendanceType,
    HasUserTimestamps,
    HasUserAdmit,
    HasUserDelete,
    AdmittedTimestamp,
};

class ScheduleSubmission extends Model
{
    use SoftDeletes, HasEmployee, HasBranch, HasAttendanceType,
        HasUserTimestamps, HasUserDelete, AdmittedTimestamp;

    /**
     * @var array
     */
    protected $casts = [
        'schedule_in_datetime' => 'datetime:Y-m-d H:i:s',
        'schedule_out_datetime' => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * Make a flexible schedule date.
     * 
     * @return string
     */
    public function getScheduleDateAttribute()
    {
        return $this->schedule_in_datetime->format('Y-m-d');
    }
}
