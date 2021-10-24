<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Models\Concerns\{
    HasUserTimestamps,
    HasUserDelete,
    ActiveFlag,
};

class OperationalPhotoPenaltyType extends Model
{
    use SoftDeletes, HasUserTimestamps, HasUserDelete, ActiveFlag;

    /**
     * @var array
     */
    protected $casts = [
        'amount' => 'float',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function operationalPhotoType()
    {
        return $this->belongsTo(OperationalPhotoType::class);
    }
}
