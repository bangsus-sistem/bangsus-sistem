<?php

namespace Waffleboss\Library\Models\System;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use Waffleboss\Library\Models\Concerns\{
    HasUserTimestamps,
    HasUserDelete,
    ActiveFlag,
    HiddenFlag,
    LockedFlag,
};

class BranchType extends Model
{
    use SoftDeletes, HasUserTimestamps, HasUserDelete, ActiveFlag, HiddenFlag,
        LockedFlag;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}
