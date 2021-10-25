<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Models\Concerns\{
    HasUserTimestamps,
    HasUserDelete,
    HasBranch,
    HasEmployee,
    HasImage,
    ActiveFlag,
};

class OperationalPhoto extends Model
{
    use SoftDeletes, HasUserTimestamps, HasUserDelete, ActiveFlag,
        HasBranch, HasEmployee, HasImage;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function operationalPhotoType()
    {
        return $this->belongsTo(OperationalPhotoType::class);
    }
}
