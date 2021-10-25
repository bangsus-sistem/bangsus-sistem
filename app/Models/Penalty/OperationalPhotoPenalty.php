<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Models\Concerns\{
    HasUserTimestamps,
    HasUserDelete,
    HasImage,
    ActiveFlag,
};

class OperationalPhotoPenalty extends Model
{
    use SoftDeletes, HasUserTimestamps, HasUserDelete, ActiveFlag,
        HasBranch, HasEmployee, HasImage;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function operationalPhoto()
    {
        return $this->belongsTo(OperationalPhoto::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function operationalPhotoPenaltyType()
    {
        return $this->belongsTo(OperationalPhotoPenaltyType::class);
    }
}
