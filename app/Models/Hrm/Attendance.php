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
    HasImage,
    HasUserTimestamps,
    HasUserDelete,
};

class Attendance extends Model
{
    use SoftDeletes, HasEmployee, HasBranch, HasAttendanceType, HasImage,
        HasUserTimestamps, HasUserDelete;

    /**
     * @var array
     */
    protected $casts = [
        'schedule_in_datetime' => 'datetime:Y-m-d H:i:s',
        'schedule_out_datetime' => 'datetime:Y-m-d H:i:s',
        'attendance_in_datetime' => 'datetime:Y-m-d H:i:s',
        'attendance_out_datetime' => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * Make a flexible attendance date attribute based on either the schedule
     * datetime or the atttendance datetime.
     * 
     * @return string
     */
    public function getAttendanceDateAttribute()
    {
        return $this->schedule_in_datetime != null
            ?   $this->schedule_in_datetime->format('Y-m-d')
            :   $this->attendance_in_datetime->format('Y-m-d');
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
