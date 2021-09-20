<?php

namespace App\Models\Hrm;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Models\Concerns\{
    Geometry,
    HasEmployee,
    HasBranch,
    HasAttendanceType,
    HasImage,
    HasUserTimestamps,
    HasUserDelete,
};

class Attendance extends Model
{
    use SoftDeletes, Geometry, HasEmployee, HasBranch, HasAttendanceType,
        HasImage, HasUserTimestamps, HasUserDelete;

    /**
     * List of geometry fields.
     * 
     * @var array
     */
    protected $geometry = ['position'];

    /**
     * Select geometrical attributes as text from database.
     *
     * @var bool
     */
    protected $geometryAsText = true;

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
