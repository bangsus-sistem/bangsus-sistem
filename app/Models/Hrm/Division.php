<?php

namespace App\Models\Hrm;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Models\Concerns\{
    HasUserTimestamps,
    HasUserDelete,
    ActiveFlag,
};

class Division extends Model
{
    use SoftDeletes, HasUserTimestamps, HasUserDelete, ActiveFlag;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobTitles()
    {
        return $this->hasMany(JobTitle::class);
    }
}
