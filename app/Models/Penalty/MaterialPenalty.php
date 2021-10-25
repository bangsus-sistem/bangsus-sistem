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

    public static function getPenalty($month, $year, $branchId)
    {
        return self::where('month', $month)->where('year', $year)->where('branch_id', $branchId)->sum('total');
    }
}
