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

class ProductionType extends Model
{
    use SoftDeletes, HasUserTimestamps, HasUserDelete, ActiveFlag;
}
