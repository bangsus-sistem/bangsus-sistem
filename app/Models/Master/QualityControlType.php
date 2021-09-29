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

class QualityControlType extends Model
{
    use SoftDeletes, HasUserTimestamps, HasUserDelete, ActiveFlag;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function qualityControlParameters()
    {
        return $this->hasMany(QualityControlParameter::class);
    }
}
