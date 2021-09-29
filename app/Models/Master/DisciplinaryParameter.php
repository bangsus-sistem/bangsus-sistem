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

class DisciplinaryParameter extends Model
{
    use SoftDeletes, HasUserTimestamps, HasUserDelete, ActiveFlag;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function disciplinaryValues()
    {
        return $this->hasMany(DisciplinaryValue::class);
    }
}
