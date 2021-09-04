<?php

namespace App\Models\Log;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Models\Concerns\{
    HasUser,
    HasUserDelete,
};

class ActivityLog extends Model
{
    use SoftDeletes, HasUser, HasUserDelete;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function activityLog()
    {
        return $this->morphTo();
    }
}
