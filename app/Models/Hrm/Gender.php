<?php

namespace App\Models\Hrm;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Models\Concerns\{
    HasUserTimestamps,
    HasUserDelete,
    HasManyEmployee,
    ActiveFlag,
};

class Gender extends Model
{
    use SoftDeletes, HasUserTimestamps, HasUserDelete, ActiveFlag;
    // use SoftDeletes, HasUserTimestamps, HasUserDelete, ActiveFlag,
    //     HasManyEmployee;
}
