<?php

namespace App\Models\Concerns;

use App\Models\Storage\File;

trait HasFile
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
