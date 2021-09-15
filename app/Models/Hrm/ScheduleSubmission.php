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
}
