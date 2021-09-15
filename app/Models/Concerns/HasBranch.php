<?php

namespace App\Models\Concerns;

use App\Models\System\Branch;

trait HasBranch
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
