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
    HasCode,
    ActiveFlag,
};
use App\Models\Master\OperationalPhotoType;

class OperationalPhoto extends Model
{
    use SoftDeletes, HasUserTimestamps, HasUserDelete, ActiveFlag,
        HasBranch, HasEmployee, HasImage, HasCode;

    /**
     * @var string
     */
    protected static $codePrefix = 'OPP';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function operationalPhotoType()
    {
        return $this->belongsTo(OperationalPhotoType::class);
    }
}
