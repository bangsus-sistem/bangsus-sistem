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

class CommonPenalty extends Model
{
    use SoftDeletes, HasUserTimestamps, HasUserDelete, ActiveFlag,
        HasBranch, HasCode;

    /**
     * @var string
     */
    protected static $codePrefix = 'CMP';

    /**
     * @var array
     */
    protected $casts = [
        'total' => 'float'
    ];
}
