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

    public static function getPenalty($month, $year, $branchId)
    {
        return self::whereMonth('transaction_datetime', '=', $month)->whereYear('transaction_datetime', '=', $year)->where('branch_id', $branchId)->sum('total');
    }
}
