<?php

namespace App\Models\Penalty;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Models\Concerns\{
    HasUserTimestamps,
    HasUserDelete,
    HasBranch,
    HasCode,
    ActiveFlag,
};

class MaterialPenalty extends Model
{
    use SoftDeletes, HasUserTimestamps, HasUserDelete, ActiveFlag,
        HasBranch, HasCode;

    /**
     * @var string
     */
    protected static $codePrefix = 'MTP';

    /**
     * @var array
     */
    protected $casts = [
        'total' => 'float'
    ];
}
