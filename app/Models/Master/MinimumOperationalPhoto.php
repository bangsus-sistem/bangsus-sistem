<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasBranch;

class MinimumOperationalPhoto extends Model
{
    use HasBranch;

    /**
     * @var boolean
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function operationalPhotoType()
    {
        return $this->belongsTo(OperationalPhotoType::class);
    }
}
