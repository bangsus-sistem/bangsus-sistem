<?php

namespace App\Models\Concerns;

use App\Models\System\Branch;
use Illuminate\Support\Str;

trait HasCode
{
    /**
     * @return string
     */
    public function generateCode()
    {
        $branch = Branch::find($this->branch_id);

        $increment = 1;
        $code = static::assembleCode($branch, $increment);
        while (static::where('code', $code)->exists()) {
            $increment++;
            $code = static::assembleCode($branch, $increment);
        }

        return $code;
    }

    /**
     * @param  mixed  $branch
     * @param  int  $increment
     * @return string
     */
    public static function assembleCode($branch, int $increment)
    {
        $branchCode = $branch->code;
        $dateCode = date('Ymd');

        return self::$codePrefix . '-' . $branchCode . '.' . $dateCode . Str::padLeft((string) $increment, 3, '0');
    }
}
