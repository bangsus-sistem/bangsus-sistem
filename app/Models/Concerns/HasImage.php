<?php

namespace App\Models\Concerns;

use App\Models\Storage\Image;

trait HasImage
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function file()
    {
        return $this->belongsTo(Image::class);
    }
}
