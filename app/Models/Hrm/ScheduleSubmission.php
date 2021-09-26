<?php

namespace App\Models\Hrm;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use Bsb\Foundation\Database\Eloquent\Extent;
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
    use Extent;
    use SoftDeletes, HasEmployee, HasBranch, HasAttendanceType,
        HasUserTimestamps, HasUserAdmit, HasUserDelete, AdmittedTimestamp;

    /**
     * @var array
     */
    protected $casts = [
        'schedule_in_datetime' => 'datetime:Y-m-d H:i:s',
        'schedule_out_datetime' => 'datetime:Y-m-d H:i:s',
        'monthly' => 'boolean',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'employee_id',
        'branch_id',
        'attendance_type_id',
        'schedule_in_datetime',
        'monthly',
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

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUserAuthorized($query)
    {
        return $query->whereHas('branch',
            fn ($query) => $query->userAuthorized()
        );
    }
}
