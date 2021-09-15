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
}
